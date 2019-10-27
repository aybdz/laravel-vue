<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Product;
use App\OrderDetail;
use App\Credit;
use App\Transaction;
use App\User;
use App\Client;

use DB;
use Auth;
use Carbon\Carbon;

class StatisticsController extends Controller
{
	public $transactions;
	public $tranYesterday;
	public $tranMonth;
	public $tranWeek;
	public $state;


    public function __construct()
    {
        $this->middleware('auth');
    }



    public function ShowStatistics()
    {
        if (!Auth::check() || Auth::user()->type != 'su') {
           return view('welcome');
        }

		$users         = User::all();
		$capital       = $this->getCapital();
		$this->getOrderDetaills() ;
		$this->getCapiteOfMonth() ;
		$this->getCreditOfMonth() ;
		$this->getClientDetaills() ;
		$this->getCreditDetaills() ;
		$this->getOrderOfMonth() ;
		$this->getTransactionDetaills() ;
		// recete par tt les admin ( utilisateur )
		$this->getRecet($users);


		$this->GetBenefitOfMonth();

        return view('statistics')->with('state',$this->state)->with('capital',$capital)->with('users',$users)->with('transactions',$this->transactions)->with('tranYesterday',$this->tranYesterday)->with('tranWeek',$this->tranWeek)->with('tranMonth',$this->tranMonth);
        
    }

    public function getRecetByUser($user)
    {
    	$this->getRecetOfDay($user,0);
    	$this->getRecetOfYesterday($user,0);
		$data['toDay']     = $this->transactions;
		$data['yesterday'] = $this->tranYesterday;
		return $data;
    }

    private function getCapital()
    {
		$products = Product::all();
		$this->state['productNbr'] = $products->count();
		$somme    = 0;
    	foreach ($products as $product) {
    		$somme = $somme + $product->qty * $product->priceA;	
    	}
    	return $somme;
    }


    private function getOrderDetaills()
    {
		$orders = Order::all();
		$this->state['ordersNbr'] = $orders->count();
    }

    private function getTransactionDetaills()
    {
		$transactions = Transaction::all();
		$this->state['transactionNbr'] = $transactions->count();
    }

    private function getClientDetaills()
    {
		$clients = Client::all();
		$this->state['clientNbr'] = $clients->count();
    }

    private function getCreditDetaills()
    {
		$credit = Client::sum('credit');
		$this->state['CreditTotal'] = $credit;
    }

    private function getCapiteOfMonth()
    {
		$now                          = Carbon::now();
		$from                         = $now->startOfMonth()->toDateString();
		$to                           = $now->endOfMonth()->toDateString();
		$amount                       = Transaction::whereBetween('created_at', [$from, $to])->sum('amount');
		$this->state['CapiteOfMonth'] = $amount;
    }

    private function getCreditOfMonth()
    {
		$now                          = Carbon::now();
		$from                         = $now->startOfMonth()->toDateString();
		$to                           = $now->endOfMonth()->toDateString();
		$amount                       = Credit::whereBetween('created_at', [$from, $to])->sum('staid');
		$this->state['CreditOfMonth'] = $amount;
    }

    private function getOrderOfMonth()
    {
    	$now                       = Carbon::now();
		$from                      = $now->startOfMonth()->toDateString();
		$to                        = $now->endOfMonth()->toDateString();
    	$count                     = Order::whereBetween('created_at', [$from, $to])->count();
		$this->state['OrderOfMonth'] = $count;
    }

    private function GetBenefitOfMonth()
    {
		$now                          = Carbon::now();
		$from                         = $now->startOfMonth()->toDateString();
		$to                           = $now->endOfMonth()->toDateString();
		$OrderSample                  = Order::where('idClient','0')->whereBetween('created_at', [$from, $to])->get();
		$OrderClient                  = Order::where('idClient','!=','0')->whereBetween('created_at', [$from, $to])->get();
		$this->state['benefitSample'] = $this->calculateBenefitSample($OrderSample);
		$this->state['benefitClient'] = $this->calculateBenefitClient($OrderClient);
		
    }

    private function calculateBenefitSample($orders)
    {
    	$benefit = 0;
    	foreach ($orders as $order) {
    		foreach ($order->OrderDetail as $orderDetail) {
    			$benefit = $benefit + ($orderDetail->priceV - $orderDetail->priceA) * $orderDetail->qty ;
    		}
    	}
    	return $benefit;
    }

    private function calculateBenefitClient($orders)
    {
    	$benefit = 0;
    	foreach ($orders as $order) {
    		$somme   = 0;
    		foreach ($order->OrderDetail as $orderDetail) {
    			$somme = $somme + ($orderDetail->priceA * $orderDetail->qty) ;
    		}
    		$benefit = $benefit + ($order->Credit->paid - $somme);
    	}
    	return $benefit;
    }

    private function getRecet($users)
    {
    	$i = 0;
		foreach ($users as $user) {
			$this->getRecetOfDay($user,$i);
			$this->getRecetOfYesterday($user,$i);
			$this->getRecetOfWeek($user,$i);
			$this->getRecetOfMonth($user,$i);
			$i++;
		}
    }

    private function getRecetOfDay($user , $i)
	{
		$amount = Transaction::where('idUser',$user->id)->where('type','!=',"Commande d'achat")
		->whereDate('created_at',Carbon::today())->sum('amount');
		$amountProvider = Transaction::where('idUser',$user->id)->where('type',"Commande d'achat")
		->whereDate('created_at',Carbon::today())->sum('amount');
		$data   = array('idUser' => $user->id, 'userName' => $user->userName,'name' => $user->name, 'telephone' => $user->telephone,'amountProvider' => $amountProvider ,'amount' => $amount);
		$this->transactions[$i] = $data;
	}

	private function getRecetOfYesterday($user , $i)
	{
		$amount        = Transaction::where('idUser',$user->id)->where('type','!=',"Commande d'achat")
		->whereDate('created_at',Carbon::yesterday())->sum('amount');
		$amountProvider        = Transaction::where('idUser',$user->id)->where('type',"Commande d'achat")
		->whereDate('created_at',Carbon::yesterday())->sum('amount');
		$data          = array('idUser' => $user->id, 'userName' => $user->userName,'name' => $user->name, 'telephone' => $user->telephone,'amountProvider' => $amountProvider , 'amount' => $amount);		
		$this->tranYesterday[$i] =  $data;
	}

	private function getRecetOfWeek($user , $i)
	{
    	$now      = Carbon::now();
		$from     = $now->startOfMonth()->toDateString();
		$to       = $now->endOfMonth()->toDateString();
		$amount   = Transaction::where('idUser',$user->id)->where('type','!=',"Commande d'achat")
		->whereBetween('created_at', [$from, $to])->sum('amount');
		$amountProvider   = Transaction::where('idUser',$user->id)->where('type',"Commande d'achat")
		->whereBetween('created_at', [$from, $to])->sum('amount');
		$data     = array('idUser' => $user->id, 'userName' => $user->userName,'name' => $user->name, 'telephone' => $user->telephone,'amountProvider' => $amountProvider , 'amount' => $amount);
		$this->tranWeek[$i] = $data;
	}

	private function getRecetOfMonth($user , $i)
	{
    	$now       = Carbon::now();
		$from      = $now->startOfMonth()->toDateString();
		$to        = $now->endOfMonth()->toDateString();
		$amount    = Transaction::where('idUser',$user->id)->where('type','!=',"Commande d'achat")
		->whereBetween('created_at', [$from, $to])->sum('amount');
		$amountProvider    = Transaction::where('idUser',$user->id)->where('type',"Commande d'achat")
		->whereBetween('created_at', [$from, $to])->sum('amount');
		$data      = array('idUser' => $user->id, 'userName' => $user->userName,'name' => $user->name, 'telephone' => $user->telephone, 'amountProvider' => $amountProvider, 'amount' => $amount);
		$this->tranMonth[$i] =  $data;
	}

}
