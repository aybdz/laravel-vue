<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\OrderDetail;
use App\Credit;
use DB;
use Auth;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;


class OrderController extends Controller
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
        if (!Auth::check()) {
            return view('login');
        }
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('orders')->with('orders',$orders);
    }

    public function cancelOrder()
    {
        Cart::destroy();
        return redirect()->back();
    }

    public function showOrder($id)
    {
        $orders = OrderDetail::where('idOrder',$id)->get();
        return view('order')->with('orders',$orders);
    }

    public function getStock($id)
    {
        foreach (Cart::content()  as $cart) {
            if ($cart->id == $id) {
                return $cart->qty;
            }
        }
        return 0;
    }

    public function addCart(Request $request)
    {
        $message = "";
        $err     = true;
        $product = Product::where('bareCode',$request->id);
        if($product != null && $product->count() > 0){
            if ($product->count() == 1) {
                    $product = $product->first();
                    $qty     = $this->getStock($product->id);
                    if (($product->qty - (int)$qty) > 0) {
                        Cart::add($product->id,$product->name,1,$product->priceV, ['img' => $product->img,'bareCode' => $product->bareCode]);
                        $err             = false;
                        $data['product'] = Cart::content();
                    }else{
                        $message = 'stock';
                    }
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
            $qty     = $this->getStock($product->id);
            if (($product->qty - (int)$qty) > 0) {
                Cart::add($product->id,$product->name,1,$product->priceV, ['img' => $product->img,'bareCode' => $product->bareCode]);
                $err             = false;
                $data['product'] = Cart::content();
            }else{
                $message = 'stock';
            }
        }
        $data['err']     = $err;
        $data['message'] = $message;
        $data['product'] = Cart::content();
        return response()->json($data);
    }

    public function addCartStock(Request $request)
    {
        $err     = true;
        $message = "";
        $cart    = Cart::get($request->id);
        $product = Product::find($cart->id);
        $qty     = $product->qty ;
        $cQty    = $cart->qty;
        if ($qty >= (int)$request->qty) {
            Cart::update($request->id, $request->qty);
            $err     = false;
        }else{
            $message = 'stock';
        }
        $data['err']     = $err;
        $data['message'] = $message;
        $data['qty']     = $qty;
        $data['cQty']    = $cQty;
        return response()->json($data);
    }

    public function deleteItem(Request $request)
    {
        Cart::remove($request->id);
        return response()->json(false);
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
        $verse = (float)str_replace(',','',Cart::subTotal());
        $err = $this->SaveOrder($verse);
        
        return response()->json($err);
    }

    public function storeForClient(Request $request)
    {
        $idClient = $request->idClient;
        $verse    = $request->verse;
        $total    = (float)str_replace(',','',Cart::subTotal());
        $reste    = $request->reste;
        $type     = $request->typeClient;
        if ($type == 'store') {
            $cc       = new StoreController();
            $cc->addProductToStore($idClient);
            $cc->addCredit((int)$total - (int)$verse,$idClient);
        }elseif ($type = 'client') {
            $cc       = new ClientController();
            $cc->addCredit((int)$total - (int)$verse,$idClient);
        }
        
        $err      = $this->SaveOrder($verse,$type,$idClient);
        
        return response()->json($err);
    }

    public function SaveOrder($verse,$type = 'client' , $idClient = '0' )
    {
        $err             = false;
        DB::transaction(function () use($err , $verse , $idClient,$type ){
            $total            = (int)str_replace(',','',Cart::subTotal());
            $credit           = new Credit;
            $credit->idOrder  = '0';
            $credit->idClient = $idClient;
            $credit->total    = $total;
            $credit->paid     = $verse;
            $credit->staid    = $total-$verse;
            $credit->save();
            $order            = new Order;
            $order->hash      = $this->get_hashOrder();
            $order->idClient  = $idClient;
            if ($type == 'store') {
                $order->type  = 'store';
            }       
            $order->idCredit  = $credit->id;
            $order->idUser    = Auth::user()->id;
            $order->total     = $total;
            $order->qty       = Cart::count();
            $save             = $order->save();
            $credit->idOrder  = $order->id;
            $credit->save();
            if ($save) {
                $pc = new ProductController();
                foreach (Cart::content() as $product) {
                    $p             = Product::find($product->id);
                    $od            = new OrderDetail;
                    $od->idOrder   = $order->id;
                    $od->idProduct = $p->id;
                    $od->priceV    = $p->priceV;
                    $od->priceA    = $p->priceA;
                    $od->qty       = $product->qty;
                    $saveOd        = $od->save();
                    if (!$saveOd) {
                        $err = true;
                        DB::rollBack();
                    }
                    $e = $pc->decreaQty($p->id,$product->qty,$order->id);
                    if (!$e) {
                        $err = true;
                        DB::rollBack();
                    }
                }
            }else{
                $err = true;
                DB::rollBack();
            }
            $tc = new TransactionController();
            if ($type == 'store') {
                $tc->saveTransaction($verse , 'Magasin' , $credit->id , $order->id , $idClient );
            }else{
                $tc->saveTransaction($verse , 'Commande' , $credit->id , $order->id , $idClient );
            }
            
        });

        if (!$err) {
            Cart::destroy();
        }
        return $err;
    }

    private function get_hashOrder(){
        $pclient = "";
        $pclient .= $this->get_token(4,"numbers");
        $pclient .= $this->get_token(6,"letters");
        $exist  = Order::where('hash', $pclient)->exists();
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


    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
