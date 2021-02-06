<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $guard = null)
    {
        // $data = $request->session()->all();
        // dd($data);
        // 
        // if (Auth::guard('admin')){
        //     $admin = Auth::guard($guard);
        //     $cookie = Cookie::get('key');
        //     // dd($cookie);
        //     return redirect('/admin');
        // }

        return view('home');
    }
}
