<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('login');
    }

    public function login(REQUEST $request)
    {
        if(Auth::guard('web')->attempt(['username'=> $request->username , 'password' =>$request->password],$request->remember)){
           
            $this->middleware('guest:web');
            return redirect()->intended('dashboard');
        }else   {
            return  redirect()->back()->with('statuslogin', 'veuillez vérifier  votre usermame ou mote de pass svp !'); 
        }
        
    }
}
