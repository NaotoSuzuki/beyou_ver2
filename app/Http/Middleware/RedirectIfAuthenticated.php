<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        // 管理者用
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect(route('admin-home'));
        }
        // ...管理者用

        //ログインしようとしたときにすでにログイン済みだった場合
        if (Auth::guard($guard)->check()) {
            return redirect('/index');
        }




        return $next($request);
    }
}
