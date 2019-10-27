<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;
use Auth;
use App\Stock;
use App\ProviderDetail;
use App\OrderProvider;
use App\Transaction;

class ProviderController extends Controller
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
        $providers = Provider::all();
        return view('providers')->with('providers',$providers);
    }

    public function addProvider(Request $request)
    {
		$err                  = true;
		$provider             = new Provider;
		$provider->name       = $request->name ;
		$provider->telephonne = $request->phone;
		$provider->adress     = $request->adress;
		$provider->idUser     = Auth::user()->id;
		$save                 = $provider->save();
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

    public function showProvider($id)
    {
        if (!Auth::check()) {
            return view('login');
        }
        $trans = null;
        if ($id != 0) {
            $provider = Provider::findOrFail($id);
            $stocks   = OrderProvider::where('idProvider',$provider->id)->get();
            $trans    = Transaction::where('idClient',$provider->id)->where('type',["Versement Fournisseur","Commande d'achat"])->get();
        }else
        {
            $provider['name'] = 'Aucun fournisseu';
            $provider['id'] = '0';
            $stocks   = OrderProvider::where('idProvider','0')->get();
            $trans    = Transaction::where('type',"Versement Fournisseur")->where('idClient','0')->where('type',"Commande d'achat")->get();
        }
        return view('provider')->with('provider',$provider)->with('stocks',$stocks)->with('trans',$trans);
    }

    public function showProviderDetails($id)
    {
        if (!Auth::check()) {
            return view('login');
        }
        $op = OrderProvider::findOrFail($id);
        if ($op != null) { 
            if ($op->idProvider != '0') {
                $provider = Provider::findOrFail($op->idProvider);
                $stocks   = ProviderDetail::where('idOrder',$op->id)->get();
            }else {
                $provider['name'] = 'Aucun fournisseu';
                $provider['id']   = '0';
                $stocks           = ProviderDetail::where('idOrder',$op->id )->get();
            }       
            return view('providerDetails')->with('provider',$provider)->with('stocks',$stocks);
        }else{
            return view('login');
        }
    }

    public function showIndex($id)
    {
        $data = null;
        if (Auth::check()) {
            if ($id != 0) {
				$products           = Provider::findOrFail($id);
				$data["name"]       = $products->name;
				$data["telephonne"] = $products->telephonne;
				$data["adress"]     = $products->adress;
            }
            return view('AddProvider')->with('id',$id)->with('data',$data);
        }else{
            return view('login');
        }
    }



    public function store(Request $request)
    {
        if (!(Auth::check())) {
            return view('login');
        }
        $data       = null;
        $err        = true;
        $message    = "une erreur est survenue. veuillez réessayer ";

        if($request != null){
            if ($request->idp != 0) {
                $provider    = Provider::find($request->idp);
            }else{
                $provider           = new Provider;
            }

			$provider->name       = $request->name ;
			$provider->telephonne = $request->telephonne ;
			$provider->adress     = $request->adress ;
			$provider->idUser     = Auth::user()->id;
			$save                 = $provider->save();
            if ($save) {
                if($request->file('photo')!= null){
                    $imageName     = $provider->id . '.' . $request->file('photo')->getClientOriginalExtension();
                    $request->file('photo')->move(base_path() . '/public/image/provider/', $imageName);
                    $provider->img = $imageName ;
                    $save          = $provider->save();
                    if ($save) {
                        $err     = false;
                        $message = "le produit a éte bien ajouter";
                    }
                }else{
                    $err     = false;
                    $message = "le produit a éte bien ajouter";
                }
            }
        }
        if ($err) {
           	$data["name"]       = $request->name;
			$data["telephonne"] = $request->telephonne;
			$data["adress"]     = $request->adress;
        }
        return view('AddProvider')->with('id',$request->idp)->with("err",$err)->with("message",$message)->with("data",$data);
    }

    public function addCreditProvider(Request $request)
    {
        $request->validate([
            'idUser' => 'required|integer',
            'verse'  => 'required|integer',
        ]);
       
        $id    = $request->idUser;
        $verse = $request->verse;
        $err   = $this->editCredit($id , $verse , '-' );
        $tc  = new TransactionController();
        $sTc = $tc->saveTransaction(-((int)$verse),"Versement Fournisseur","0" ,"0",$id);
        return  redirect()->back()->with('err', $err);
    }

    public function editCredit($id , $amount , $op = '+' )
    {
        $err      = true;
        $provider = Provider::findOrFail($id);
        if ($provider != null) {
            switch ($op) {
                case '+':
                    $provider->credit = $provider->credit + (int)$amount;
                    $save             = $provider->save();
                    if ($save) {
                        $err          = false;
                    }
                    break;
                case '-':
                    $provider->credit = $provider->credit - (int)$amount;
                    $save             = $provider->save();
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
