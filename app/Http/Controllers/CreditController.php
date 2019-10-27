<?php

namespace App\Http\Controllers;

use App\Credit;
use App\Client;
use App\Transaction;
use App\Order;
use Illuminate\Http\Request;

use Auth;
use DB;

class CreditController extends Controller
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
        //
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
        if (!Auth::check()) {
            return view('login');
        }
        if ($request->verse != "0" && is_numeric($request->verse)) {
            $err = false;
            DB::transaction(function () use($request ,$err){
                $credit           = new Credit;
                $credit->idOrder  = '0';
                $credit->idClient = $request->idUser;
                $credit->total    = (int)$request->verse;
                $save = $credit->save();
                if ($save) {
                    $tc  = new TransactionController();
                    $sTc = $tc->saveTransaction((int)$request->verse,"Versement",$credit->id ,"0",$request->idUser);
                    if ($sTc) {
                        $client = Client::findOrFail($request->idUser);
                        $newC   = $client->credit-(int)$request->verse;
                        if ($newC < 0) {
                            $client->credit = 0;
                        }else{
                            $client->credit = $newC;
                        }
                        $sC = $client->save();
                        if (!$sC) {
                            $err = true;
                            DB::rollBack();
                        }
                    }else{
                        $err = true;
                        DB::rollBack();
                    }
                }else{
                    $err = true;
                    DB::rollBack();
                }
            });
        }
        $cc = new ClientController();
        return $cc->showClient($request->idUser);
        /*$client       = Client::findOrFail($request->idUser);
        $orders       = Order::where('idClient',$client->id)->where('type','client')->orderBy('created_at', 'desc')->get();
        $transactions = Transaction::where('idClient',$client->id)->where('type','Commande')->orWhere('type','Versement')->orderBy('created_at', 'desc')->get();
        return view('client')->with('Client',$client)->with('orders',$orders)->with('transactions',$transactions)->with('err',$err);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Credit  $credit
     * @return \Illuminate\Http\Response
     */
    public function show(Credit $credit)
    {
        //
    }

    public function editCredit($idUser,$verse)
    {   $err = true;
        if ($verse != "0" && is_numeric($verse)) {
            $err = false;
            DB::transaction(function () use($idUser,$verse ,$err){
                $credit           = new Credit;
                $credit->idOrder  = '0';
                $credit->idClient = $idUser;
                $credit->total    = (int)$verse;
                $save = $credit->save();
                if ($save) {
                    $tc  = new TransactionController();
                    $sTc = $tc->saveTransaction((int)$verse,"Versement",$credit->id ,"0",$idUser);
                    if ($sTc) {
                        $client = Client::findOrFail($idUser);
                        $newC   = $client->credit-(int)$verse;
                        if ($newC < 0) {
                            $client->credit = 0;
                        }else{
                            $client->credit = $newC;
                        }
                        $sC = $client->save();
                        if (!$sC) {
                            $err = true;
                            DB::rollBack();
                        }
                    }else{
                        $err = true;
                        DB::rollBack();
                    }
                }else{
                    $err = true;
                    DB::rollBack();
                }
            });
        }
        return $err;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Credit  $credit
     * @return \Illuminate\Http\Response
     */
    public function edit(Credit $credit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Credit  $credit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credit $credit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Credit  $credit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credit $credit)
    {
        //
    }
}
