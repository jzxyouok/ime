<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session::has('userInfo')) {
            return Redirect::to('/login');
        }
        if (Session::has('loginLock')) {
            Session::put('errors' , '账号已锁定 ，请输入密码后继续操作');
            return redirect('/lock');
        }
        if (time() - Session::get('adminLastOperateTime') > 60*60) {
            Session::put('errors' , '超时操作，请登录后继续操作');
            return redirect('/login');
        }
        if (time() - Session::get('adminLastOperateTime') > 60*60) {
            Session::put('errors' , '超时操作，请解除锁定后继续操作');
            return redirect('/lock');
        }
        Session::put('adminLastOperateTime' , time());
        return $next($request);
    }
}
