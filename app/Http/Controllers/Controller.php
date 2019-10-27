<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Client;
use App\Store;

use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index()
    {
    	if (Auth::check()) {
    		return view('welcome');
    	}else{
    		return view('login');
    	}
    }
    public function dashboard()
    {
    	if (Auth::check()) {
            $clients = Client::all();
            $stores  = Store::all();
            return view('welcome')->with('clients',$clients)->with('stores',$stores);
        }else{
            return view('login');
        }
    }

    public function products()
    {
        if (Auth::check()) {
            return view('products');
        }else{
            return view('login');
        }
    }

    public function AddProduct()
    {
        if (Auth::check()) {
            return view('AddProduct');
        }else{
            return view('login');
        }
    }
}
