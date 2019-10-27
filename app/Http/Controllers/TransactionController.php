<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

use Auth;

class TransactionController extends Controller
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

    public function saveTransaction($verse,$type,$idCredit,$idOrder,$idClient)
    {
        $transaction           = new Transaction;
        $transaction->hash     = $this->get_hashTransaction();
        $transaction->amount   = $verse;
        $transaction->type     = $type;
        $transaction->idClient = $idClient;
        $transaction->idCredit = $idCredit;
        $transaction->idUser   = Auth::user()->id;
        $transaction->idOrder  = $idOrder;
        $save                  = $transaction->save();
        return $save;
    }

    private function get_hashTransaction(){
        $pclient = "";
        $pclient .= $this->get_token(6,"letters");
        $pclient .= $this->get_token(6,"numbers");
        $exist  = Transaction::where('hash', $pclient)->exists();
        if ($exist) {//puid must be unique 
            if ($retries < 5) {
                $retries++;
                $this->get_hashTransaction($retries);
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

    public function getUserTransaction($id)
    {
        $transactions = Transaction::where('idUser',$id)->orderBy('created_at', 'desc')->get();
        return $transactions;
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
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
