<?php

namespace App\Http\Controllers;

use App\Product;
use App\Provider;
use App\Stock;
use App\productUpdate;
use Illuminate\Http\Request;

use Auth;
use File;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $products  = Product::orderBy('created_at', 'desc')->get();
            $providers = Provider::all();
            return view('products')->with('products',$products)->with('providers',$providers);
        }else{
            return view('login');
        }
    }

    public function printCodeBar($id)
    {   
        $product = Product::findOrFail($id);
        return view('codeBar')->with('product',$product);
    }

    public function showIndex($id)
    {
        $data = null;
        if (Auth::check()) {
            if ($id != 0) {
                $products          = Product::findOrFail($id);
                $data["codeBarre"] = $products->bareCode;
                $data["name"]      = $products->name;
                $data["priceA"]    = $products->priceA;
                $data["priceV"]    = $products->priceV;
                $data["qty"]       = $products->qty;
                $data["descp"]     = $products->descp;
            }
            return view('AddProduct')->with('id',$id)->with('data',$data);
        }else{
            return view('login');
        }
    }

    public function decreaQty($idProduct,$qty,$idOrder,$type = 'Commande')
    {
        $product      = Product::findOrFail($idProduct);
        $this->stockStory($product->qty,(int)$product->qty-(int)$qty,$qty,$idProduct,'0',$idOrder,$type);
        $product->qty = $product->qty-$qty;
        $res          = $product->save();
        return $res;
    }

    public function generate_BareCode()
    {
        $data = $this->get_BareCode();
        return response()->json($data);
    }

    private function get_BareCode(){
        $pclient = "";
        $pclient .= $this->get_token(4,"letters");
        $pclient .= $this->get_token(4,"numbers");
        $exist  = Product::where('bareCode', $pclient)->exists();
        if ($exist) {//puid must be unique 
            if ($retries < 5) {
                $retries++;
                $this->get_BareCode($retries);
            }
        }else {
            return $pclient;
        }
    }

    protected function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd >= $range);
        return $min + $rnd;
    }

    /*** changed from protected to public */
    public function get_token($length,$type="all")
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        switch ($type) {
            case 'letters':
                $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                break;
            case 'numbers':
                $codeAlphabet= "0123456789";
                break;
        }
        $max = strlen($codeAlphabet) - 1;
        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max)];
        }
        return $token;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!(Auth::check())) {
            return view('login');
        }

        $oldProduct = "";
        $newProduct = "";
        $type       = "";
        $data       = null;
        $err        = true;
        $message    = "une erreur est survenue. veuillez réessayer ";

        if($request != null){
            if ($request->idp != 0) {
                $product    = Product::find($request->idp);
                $oldProduct = $product;
                $type       = "update";
            }else{
                $product           = new Product;
                $product->bareCode = $request->codeBarre ;
                $product->qty      = 0 ;
                $type              = "add";  
            }

            $product->name      = $request->name ;
            $product->priceA    = 0 ;
            $product->priceV    = 0 ;
            $product->descp     = $request->descp ;
            $product->idUser    = Auth::user()->id;
            $save               = $product->save();
            if ($save) {
                if($request->file('photo')!= null){
                    $imageName    = $product->id . '.' . $request->file('photo')->getClientOriginalExtension();
                    $request->file('photo')->move(base_path() . '/public/image/', $imageName);
                    $product->img = $imageName ;
                    $save         = $product->save();
                    if ($save) {
                        $err     = false;
                        $message = "le produit a éte bien ajouter";
                    }
                }else{
                    $err     = false;
                    $message = "le produit a éte bien ajouter";
                }
                $newProduct = $product;
                $idProduct  = $product->id;
                $this->updateStory($type,$oldProduct,$newProduct,$idProduct);
            }
        }
        if ($err) {
            $data["id"]        = $request->idp;
            $data["codeBarre"] = $request->codeBarre;
            $data["name"]      = $request->name;
            $data["priceA"]    = $request->priceA;
            $data["priceV"]    = $request->priceV;
            $data["qty"]       = $request->qty;
            $data["descp"]     = $request->descp;
        }
        return view('AddProduct')->with('id',$request->idp)->with("err",$err)->with("message",$message)->with("data",$data);
    }

    public function updateStory($type ,$oldProduct,$newProduct,$idProduct)
    {
        if($newProduct != "") {
            $newProduct = json_encode($newProduct->toArray());
        }
        if($oldProduct != "") {
            $oldProduct = json_encode($oldProduct->toArray());
        }
        $productUpdate             = new productUpdate;
        $productUpdate->idUser     = Auth::user()->id;
        $productUpdate->type       = $type;
        $productUpdate->idProduct  = $idProduct;
        $productUpdate->oldProduct = $oldProduct;
        $productUpdate->newProduct = $newProduct;
        $productUpdate->save();
    }

    public function removeProduct(Request $request)
    {
        $err = true;
        $product = Product::findOrFail($request->id);
        if($product != null){
            if( $product->img != "noImg.png" ) {
                $image_path = 'image/'.$product->img;  // Value is not URL but directory file path
                File::delete($image_path);
            }
            $idProduct  = $product->id;
            $this->updateStory("remove" ,$product,"",$idProduct);
            $product->delete();
            $err = false;
        }
        return response()->json($err);
    }

    public function AddStock(Request $request)
    {
        $err      = true;
        $product  = Product::findOrFail($request->id);
        if($product != null){
            if ($request->idProvider != 0) {
                if ((int)$request->total - (int)$request->verse < 0) {
                    return response()->json($err);
                }else{
                    $provider = new ProviderController();
                    $p        = $provider->editCredit( $request->idProvider , (int)$request->total - (int)$request->verse );
                    if ($p) {
                       return response()->json($err);
                    }
                }            
            }
            
            if ($product->priceA == (int)$request->prixA && $product->priceV == (int)$request->prixV) {
                $product->qty = (int)$product->qty+(int)$request->qty;
                $save         = $product->save();
                if ($save) {
                    $err     = false;
                    $message = "le produit a éte bien mis a joure";
                    $this->stockStory($product->qty,(int)$product->qty+(int)$request->qty,$request->qty,$request->id,$request->idProvider,null);
                }
            }else{
                $newProduct           = new Product;
                $newProduct->bareCode = $product->bareCode;
                $newProduct->qty      = (int)$request->qty;
                $newProduct->name     = $product->name ;
                $newProduct->priceA   = $request->prixA ;
                $newProduct->priceV   = $request->prixV ;
                $newProduct->descp    = $product->descp ;
                $newProduct->idUser   = Auth::user()->id;
                $newProduct->img      = $product->img ;
                $save                 = $newProduct->save();
                if ($save) {
                    $err     = false;
                    $message = "le stock a été ajouté en tant que nouveau produit";
                }
                $this->stockStory(0,(int)$request->qty,$request->qty,$newProduct->id,$request->idProvider,null,"Ajouter tant que nouveau produit");
            }
            
            
        }
        return response()->json($err);
    }

    public function stockStory($oldStock,$newStock,$stk,$idProduct,$IdProvider,$idOrder,$type="Ajouter au Stock")
    {
        $stock             = new Stock();
        $stock->type       = $type ;
        $stock->idUser     = Auth::user()->id ;
        $stock->idProduct  = $idProduct ;
        $stock->idOrder    = $idOrder ;
        $stock->oldQty     = $oldStock ;
        $stock->newQty     = $newStock ;
        $stock->Qty        = $stk;
        $stock->idProvider = $IdProvider;
        $stock->save();
    }


    public function showDetails($id)
    {
        if (!(Auth::check())) {
            return view('login');
        }
        
        $product        = Product::findOrFail($id);
        $stocks         = Stock::where('idProduct',$id)->get();
        $productUpdates = productUpdate::where('idProduct',$id)->get();
        return view('historique')->with('product',$product)->with('stocks',$stocks)->with('productUpdates',$productUpdates);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
