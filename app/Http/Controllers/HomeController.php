<?php

namespace App\Http\Controllers;


use App\Product;
use App\Stock;
use App\Client;
use App\productUpdate;
use Illuminate\Http\Request;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       if (Auth::check()) {
            $clients = Client::all();
            return view('welcome')->with('clients',$clients);
        }else{
            return view('login');
        }
    }

    
}
