<?php

namespace App\Http\Controllers;

use App\Client;
use App\Order;
use App\Transaction;
use Illuminate\Http\Request;

use Auth;
use DB;
use File;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        if (!Auth::check()) {
            return view('login');
        }
        $clients = Client::all();
        return view('clients')->with('clients',$clients);
    }

    public function showIndex($id)
    {
        $data = null;
        if (Auth::check()) {
            if ($id != 0) {
                $client             = Client::findOrFail($id);
                $data["name"]       = $client->name;
                $data["telephonne"] = $client->telephonne;
                $data["adress"]     = $client->adress;
                $data["img"]        = $client->img;
            }
            return view('AddClient')->with('id',$id)->with('data',$data);
        }else{
            return view('login');
        }
    }

    public function updateClient(Request $request)
    {
        $client = Client::findOrFail($request->idp);
        if($client != null){
            $client->name       = $request->name;
            $client->telephonne = $request->telephonne;
            $client->adress     = $request->adress;
            if($request->file('photo')!= null){
                $imageName   = $client->id . '.' . $request->file('photo')->getClientOriginalExtension();
                $request->file('photo')->move(base_path() . '/public/image/client/', $imageName);
                $client->img = $imageName ;
                $save        = $client->save();
                if ($save) {
                    $err     = false;
                }
            }else{
                $save        = $client->save();
                if ($save) {
                    $err     = false;
                }
            }
        }
        return redirect()->back()->with('err', $err);
    }

    public function showClient($id,$err = null)
    {

        if (!Auth::check()) {
            return view('login');
        }
        $client       = Client::findOrFail($id);
        $orders       = Order::where('idClient',$client->id)->where('type','client')->orderBy('created_at', 'desc')->get();
        $transactions = Transaction::where('idClient',$client->id)->where('type','Commande')->orWhere('type','Versement')->orderBy('created_at', 'desc')->get();
        return view('client')->with('err',$err)->with('Client',$client)->with('orders',$orders)->with('transactions',$transactions);
    }

    public function addCreditClient(Request $request)
    {
        $Cc = new CreditController();
        $err = $Cc->editCredit($request->idUser,$request->verse);
        
        return  redirect()->back()->with('err', $err);
    }

    public function addCredit($creditAdd,$idClient)
    {
        $client = Client::findOrFail($idClient);
        $client->credit = (int)$client->credit + (int)$creditAdd;
        $client->save();
    }


    public function addClient(Request $request)
    {
        $err                = true;
        $client             = new Client;
        $client->hash       = $this->get_hashClient();
        $client->name       = $request->name ;
        $client->telephonne = $request->telephonne;
        $client->adress     = $request->adress;
        $client->idUser     = Auth::user()->id;
        $save               = $client->save();
        if ($save) {
            $err     = false;
        }
        return response()->json($err);
    }

    private function get_hashClient(){
        $pclient = "";
        $pclient .= $this->get_token(6,"letters");
        $pclient .= $this->get_token(6,"numbers");
        $exist  = Client::where('hash', $pclient)->exists();
        if ($exist) {//puid must be unique 
            if ($retries < 5) {
                $retries++;
                $this->get_hashClient($retries);
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

    public function editClientImg(Request $request)
    {
        $client = Client::findOrFail($request->id);
        if($client != null){
            if($request->file('photo')!= null){
                $imageName   = $client->id . '.' . $request->file('photo')->getClientOriginalExtension();
                $request->file('photo')->move(base_path() . '/public/image/client/', $imageName);
                $client->img = $imageName ;
                $save        = $client->save();
                if ($save) {
                    $err     = false;
                }
            }
        }
        return redirect()->back();
    }

    public function editClient(Request $request)
    {
        $err = true;
        $Client = Client::findOrFail($request->id);
        if($Client != null){
            $Client->name       = $request->name ;
            $Client->adress     = $request->adress;
            $Client->telephonne = $request->telephonne;
            $save               = $Client->save();
            if ($save) {
             /*   if($request->file('photo')!= null){
                $imageName   = $client->id . '.' . $request->file('photo')->getClientOriginalExtension();
                $request->file('photo')->move(base_path() . '/public/image/client/', $imageName);
                $client->img = $imageName ;
                $save        = $client->save();
                if ($save) {
                    $err     = false;
                }
            }*/
                $err = false;
            }
        }
        return response()->json($err);
    }


    public function removeClient(Request $request)
    {
        $err = true;
        $client = Client::findOrFail($request->id);
        if($client != null){
            $client->delete();
            $err = false;
        }
        return response()->json($err);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
