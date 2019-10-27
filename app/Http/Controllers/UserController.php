<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Auth;
use App\User;
use App\Stock;
use App\productUpdate;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        if (!Auth::check()) {
            return view('login');
        }

        $Sc      = new StatisticsController();
        $amount  = $Sc->getRecetByUser(Auth::user());
        return view('profile')->with('amount',$amount);
    }

    public function updateUser(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        if ($request->Upassword != '') 
        {
            if (!password_verify($request->Upassword,Auth::user()->password)) 
            {
                $err = 'mauvais mot de passe';
            }elseif(strlen($request->Npassword)<6 || strlen($request->Cpassword)<6 || ($request->Npassword != $request->Cpassword) )
            {
                $err = 'nouveau mot de passe et confirmation ne sont pas identiques et doit comporter au moins 6 caractères';
            }else
            {
                $user->password  = Hash::make($request->Npassword);
                $user->name      = $request->Uname ;
                $user->telephone = $request->Uphone;
                $save            = $user->save();
                if (!$save) {
                    $err = "Une erreur s'est produite veuillez réessayer";
                }else{
                    $err = false;
                }
            }
        }else{
            $user->name      = $request->Uname ;
            $user->telephone = $request->Uphone;
            $save            = $user->save();
            if (!$save) {
                $err = "Une erreur s'est produite veuillez réessayer";
            }else{
                $err = false;
            }
        }
        $Sc      = new StatisticsController();
        $amount  = $Sc->getRecetByUser(Auth::user());
        return view('profile')->with('err',$err)->with('amount',$amount);
    }

    public function index()
    {
    	if (!Auth::check()) {
    		return view('login');
    	}
    	$users = User::all();
    	return view('users')->with('users',$users);
    }

    public function addUser(Request $request)
    {
		$err             = true;
		$user            = new User;
		$user->userName  = $request->username;
		$user->name      = $request->name ;
		$user->password  = Hash::make($request->password);
		$user->telephone = $request->telephone;
		$user->type      = "ns";
		$save = $user->save();
		if ($save) {
			$err = false;
		}
        return response()->json($err);
    }

    public function editUser(Request $request)
    {
    	$err = true;
        $user = User::findOrFail($request->id);
        if($user != null){
			$user->name      = $request->name ;
			$user->password  = Hash::make($request->password);
			$user->telephone = $request->telephone;
			$save = $user->save();
			if ($save) {
				$err = false;
			}
        }
        return response()->json($err);
    }

    public function removeUser(Request $request)
    {
    	$err = true;
        $user = User::findOrFail($request->id);
        if($user != null){
            $user->delete();
            $err = false;
        }
        return response()->json($err);
    }

    public function showUser($id)
    {
    	if (!Auth::check()) {
    		return view('login');
    	}
        
        $user        = User::findOrFail($id);
        $tc          = new TransactionController();
        $Trasactions = $tc->getUserTransaction($id);
    	return view('user')->with('user',$user)->with('Trasactions',$Trasactions);
    }

    
}
