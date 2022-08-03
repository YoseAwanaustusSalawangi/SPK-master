<?php

namespace App\Http\Controllers;

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
        $role = Auth::user()->role;
        $cookie_name = "role";
        $exist = $_COOKIE[$cookie_name];
        $cookie_value = $role;
        
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
        return view('home');
    }
}
