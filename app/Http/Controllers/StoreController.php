<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Order;
use App\Product;
use App\StoreProduct;
use App\OrderDetail;
use App\Credit;
use Auth;


use Gloudemans\Shoppingcart\Facades\Cart;


class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	if (!Auth::check()) {
            return view('login');
        }
		$stores       = Store::all();
		$storeProduct = StoreProduct::all();
        return view('stores')->with('stores',$stores)->with('storeProduct',$storeProduct);
    }

    public function editPriceV(Request $request)
    {
    	$err               = true;
		$store             = StoreProduct::find($request->id);
		if ($store != null) {
			$store->priceV = (int)$request->prixV;
			$save          = $store->save();
	        if ($save) {
	            $err     = false;
	        }
		}
		
		
        return response()->json($err);
    }

    public function addStore(Request $request)
    {
		$err               = true;
		$store             = new Store;
		$store->name       = $request->name ;
		$store->telephonne = $request->phone;
		$store->adress     = $request->adress;
		$store->idUser     = Auth::user()->id;
		$save              = $store->save();
        if ($save) {
            $err     = false;
        }
        return response()->json($err);
    }

    public function editProviderStatus(Request $request)
    {
		$err      = true;
		$provider = Provider::findOrFail($request->id);
        if($provider != null){
			$provider->status = $request->status;
			$save             = $provider->save();
	        if ($save) {
	            $err     = false;
	        }
        }
        return response()->json($err);
    }

    public function showStore($id)
    {
        if (!Auth::check()) {
            return view('login');
        }
		$store  = Store::findOrFail($id);
		$orders = Order::where('idClient',$store->id)->where('type','store')->get();
        return view('store')->with('store',$store)->with('orders',$orders);
    }

    public function addCredit($creditAdd,$idClient)
    {
        $client = Store::findOrFail($idClient);
        $client->credit = $client->credit + (int)$creditAdd;
        $client->save();
    }

    public function addProductToStore($idStore)
    {	
    	foreach (Cart::content() as $product) 
    	{
            $p  = Product::find($product->id);
            if ($p != null) {
                $ep = StoreProduct::where('idProduct','=',$product->id)->first();
                if ($ep == null) {
                    $sd            = new StoreProduct;
                    $sd->idProduct = $p->id;
                    $sd->idStore   = $idStore;
                    $sd->priceA    = $product->price;
                    $sd->save();
                }
            }
        }   
   	}

   	public function storeOrder($id)
   	{
   		$orders = OrderDetail::where('idOrder',$id)->get();
        return view('storeOrder')->with('orders',$orders);
   	}

   	public function addCreditStore(Request $request)
    {
        $request->validate([
            'idUser' => 'required|integer',
            'verse'  => 'required|integer',
        ]);
       
        $id    = $request->idUser;
        $verse = $request->verse;
        $err   = $this->editCredit($id , $verse , '-' );
        return  redirect()->back()->with('err', $err);
    }

   	public function paidOrderStore(Request $request)
    {
        $request->validate([
			'storeID'     => 'required|integer',
			'idOrder'    => 'required|integer',
			'verseOrder' => 'required|integer',
        ]);
        $err 	 = true;
		$idOrder = $request->idOrder;
		$id      = $request->storeID;
		$verse   = $request->verseOrder;
		$credit  = Credit::where('idOrder',$idOrder)->where('idClient',$id)->first();

		if ($credit != null) {
			$credit->paid  = (int)$credit->paid+(int)$verse;
			$credit->staid = (int)$credit->staid-(int)$verse;
			$err 		   = $credit->save();
			if ($err) {
				$err = $this->editCredit($id , $verse , '-' );
			}	 
		}
		

        return  redirect()->back()->with('err', $err);
    }

    public function editCredit($id , $amount , $op = '+' )
    {
		$err   = true;
		$store = Store::findOrFail($id);
        if ($store != null) {
            switch ($op) {
                case '+':
                    $store->credit = $store->credit + (int)$amount;
                    $save             = $store->save();
                    if ($save) {
                        $err          = false;
                    }
                    break;
                case '-':
                    $store->credit = $store->credit - (int)$amount;
                    $save             = $store->save();
                    if ($save) {
                        $err          = false;
                    }
                    break;
                
                default:
                    break;
            }
        }
        return $err;
        
    }

}
