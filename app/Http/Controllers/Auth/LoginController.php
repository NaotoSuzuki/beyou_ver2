<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\IndexController;

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

    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
   {
       return view('auth.login');
   }


    //管理者ログインフォーム表示
    public function showAdminLoginForm()
   {
       return view('auth.login', ['authgroup' => 'admin']);
   }

   //管理者ログイン
   public function adminLogin(Request $request)
   {


       $this->validate($request, [
           'email'   => 'required|email',
           'password' => 'required|min:8'
       ]);

       if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, ], $request->get('remember'))) {

           return redirect()->intended('/admin');
       }

       return back()->withInput($request->only('email', 'remember'));
   }
   // ...管理ログイン

   public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        // $request->session()->regenerateToken();


        return redirect('/');
    }



}
