<?php

namespace App\Http\Controllers;

use App\OrderProvider;
use App\Provider;
use App\Product;
use App\ProviderDetail;
use App\CreditProvider;
use Illuminate\Http\Request;
use Auth;
use DB;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderProviderController extends Controller
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
            $clients = Provider::all();
            return view('orderProvider')->with('clients',$clients);
        }else{
            return view('login');
        }
    }

    public function addCart(Request $request)
    {
        $message = "";
        $err     = true;
        $product = Product::where('bareCode',$request->id);
        if($product != null && $product->count() > 0){
            if ($product->count() == 1) {
                    $product = $product->first();
                    $rowId   = $this->getRowId($product->id);
                    if ($rowId == 0) {
                        Cart::instance('Provider')->add($product->id,$product->name,1,$product->priceA, ['img' => $product->img,'bareCode' => $product->bareCode,'prixV' => $product->priceV]);
                    }else{
                        $cart    = Cart::instance('Provider')->get($request->id);
                        Cart::instance('Provider')->update($rowId, (int)$cart->qty++);
                    }
                    $err             = false;
                    $data['product'] = Cart::instance('Provider')->content();
            }else{ // with have more then one product with the same bare-code and with deffrane price
                $data['product'] = $product->get();
                $err             = 'more';
            }
        }
        $data['err']     = $err;
        $data['message'] = $message;
        
        return response()->json($data);
    }

    public function addCartPlus(Request $request)
    {
        $message = "";
        $err     = true;
        $product = Product::find($request->id);
        if($product != null){
            $rowId   = $this->getRowId($product->id);
            if ($rowId == 0) {
                Cart::instance('Provider')->add($product->id,$product->name,1,$product->priceA, ['img' => $product->img,'bareCode' => $product->bareCode,'prixV' => $product->priceV]);
            }else{
                $cart    = Cart::instance('Provider')->get($request->id);
                Cart::instance('Provider')->update($rowId, (int)$cart->qty++);
            }
            $err             = false;
        }
        $data['err']     = $err;
        $data['message'] = $message;
        $data['product'] = Cart::instance('Provider')->content();
        return response()->json($data);
    }

    public function updatePriceA(Request $request)
    {   
        $err     = true;
        $cart    = Cart::instance('Provider')->get($request->rowid);
        if ($cart != null) {
            Cart::instance('Provider')->update($request->rowid,['price' => $request->prixA]);
            $err             = false;
        }
        $data['err']     = $err;
        $data['product'] = Cart::instance('Provider')->content();
        return response()->json($data);
    }

    public function updatePriceV(Request $request)
    {
        $err     = true;
        $cart    = Cart::instance('Provider')->get($request->rowid);
        if ($cart != null) {
            Cart::instance('Provider')->update($request->rowid,['options' => ['img' => $cart->options->img,'bareCode' => $cart->options->bareCode,'prixV' =>  $request->prixV]]);
            $err             = false;
        }
        $data['err']     = $err;
        $data['product'] = Cart::instance('Provider')->content();
        return response()->json($data);
    }

    public function getRowId($id)
    {
        foreach (Cart::instance('Provider')->content()  as $cart) {
            if ($cart->id == $id) {
                return $cart->rowId;
            }
        }
        return 0;
    }

    public function addCartStock(Request $request)
    {
        $err     = true;
        $message = "";
        $cart    = Cart::instance('Provider')->get($request->id);
        Cart::instance('Provider')->update($request->id, $request->qty);
        $err     = false;
        $data['err']     = $err;
        $data['message'] = $message;
        $data['product'] = Cart::instance('Provider')->content();
        return response()->json($data);
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
        $verse = (float)str_replace(',','',Cart::instance('Provider')->subTotal());
        $err = $this->SaveOrder($verse);
        
        return response()->json($err);
    }

    public function storeForProvider(Request $request)
    {
        $idProvider = $request->idClient;
        $verse      = $request->verse;
        $total      = $request->totalCmd;
        $reste      = $request->reste;
        $pc         = new ProviderController();
        $pc->editCredit($idProvider,$reste);
        $err        = $this->SaveOrder($verse,$idProvider);
        
        return response()->json($err);
    }

    public function SaveOrder($verse , $idClient = '0' )
    {
        $err             = false;
        DB::transaction(function () use($err , $verse , $idClient ){
            $total              = (int)str_replace(',','',Cart::instance('Provider')->subTotal());
            $credit             = new CreditProvider;
            $credit->idOrder    = '0';
            $credit->idProvider = $idClient;
            $credit->total      = $total;
            $credit->paid       = $verse;
            $credit->staid      = $total-$verse;
            $credit->save();
            $order              = new OrderProvider;
            $order->hash        = $this->get_hashOrder();
            $order->idProvider  = $idClient;
            $order->idCredit    = $credit->id;
            $order->idUser      = Auth::user()->id;
            $order->total       = $total;
            $order->qty         = Cart::instance('Provider')->count();
            $save               = $order->save();
            $credit->idOrder    = $order->id;
            $credit->save();
            if ($save) {
                foreach (Cart::instance('Provider')->content() as $product) {
                    $od            = new ProviderDetail;
                    $od->idOrder   = $order->id;
                    $od->idProduct = $product->id;
                    $od->priceV    = $product->options->prixV;
                    $od->priceA    = $product->price;
                    $od->qty       = $product->qty;
                    $saveOd        = $od->save();
                    if (!$saveOd) {
                        $err = true;
                        DB::rollBack();
                    }
                    $e = $this->AddStock($product->id,$idClient,(int)$total-(int)$verse,$product->price,$product->options->prixV,$product->qty);
                    if ($e) {
                        $err = true;
                        DB::rollBack();
                    }

                }
            }else{
                $err = true;
                DB::rollBack();
            }
            $tc = new TransactionController();
            $tc->saveTransaction(-$verse , "Commande d'achat" , $credit->id , $order->id , $idClient );
        });

        if (!$err) {
            Cart::destroy();
        }
        return $err;
    }

    public function AddStock($idProduct,$idProvider,$reste,$prixA,$prixV,$qty)
    {
        $err      = true;
        $product  = Product::findOrFail($idProduct);
        if($product != null){
            if (((int)$product->priceA == (int)$prixA || (int)$product->priceA == 0) && ((int)$product->priceV == (int)$prixV || (int)$product->priceV == 0  )) {
                $product->qty    = (int)$product->qty+(int)$qty;
                $product->priceA = (int)$prixA;
                $product->priceV = (int)$prixV;
                $save            = $product->save();
                if ($save) {
                    $err     = false;
                    $message = "le produit a éte bien mis a joure";
                    $pc      = new ProductController();
                    $pc->stockStory($product->qty,(int)$product->qty+(int)$qty,$qty,$idProduct,$idProvider,null);
                }
            }else{
                $newProduct           = new Product;
                $newProduct->bareCode = $product->bareCode;
                $newProduct->qty      = (int)$qty;
                $newProduct->name     = $product->name ;
                $newProduct->priceA   = $prixA ;
                $newProduct->priceV   = $prixV ;
                $newProduct->descp    = $product->descp ;
                $newProduct->idUser   = Auth::user()->id;
                $newProduct->img      = $product->img ;
                $save                 = $newProduct->save();
                if ($save) {
                    $err     = false;
                    $message = "le stock a été ajouté en tant que nouveau produit";
                }
                $pc           = new ProductController();
                $pc->stockStory(0,(int)$qty,$qty,$newProduct->id,$idProvider,null,"Ajouter tant que nouveau produit");
            }
            
            
        }
        return $err;
    }

    /*private function incQty($product,$qty,$idOrder)
    {
        $pc           = new ProductController();
        $pc->stockStory($product->qty,(int)$product->qty+(int)$qty,$qty,$product->id,'0',$idOrder,$type);
        $product->qty = (int)$product->qty+(int)$qty;
        $res          = $product->save();
        return $res;
    }*/

    private function get_hashOrder(){
        $pclient = "";
        $pclient .= $this->get_token(4,"numbers");
        $pclient .= $this->get_token(6,"letters");
        $exist  = OrderProvider::where('hash', $pclient)->exists();
        if ($exist) {//puid must be unique 
            if ($retries < 5) {
                $retries++;
                $this->get_hashOrder($retries);
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

    public function deleteItem(Request $request)
    {
        Cart::instance('Provider')->remove($request->id);
        return response()->json(false);
    }

    public function cancelOrder()
    {
        Cart::instance('Provider')->destroy();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderProvider  $orderProvider
     * @return \Illuminate\Http\Response
     */
    public function show(OrderProvider $orderProvider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderProvider  $orderProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderProvider $orderProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderProvider  $orderProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderProvider $orderProvider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderProvider  $orderProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderProvider $orderProvider)
    {
        //
    }
}
