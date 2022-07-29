<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;
    protected $data = RouteServiceProvider::DATA;
    public function redirectTo() {
   
        $role = Auth::user()->role; 
        $cookie_name = "role";
        $exist = $_COOKIE[$cookie_name];
        $cookie_value = $role;
        
        setcookie($cookie_name, $cookie_value, time() + (60 * 60 * 24 * 30), "/");
       
        switch ($role) {
          case "1":
            return '/home';
            break;
          case "2":
            return '/data';
            break; 
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
