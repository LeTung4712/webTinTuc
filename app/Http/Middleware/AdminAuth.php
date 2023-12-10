<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //dd('hello');
        if(Auth::check())
        {
            if(Auth::user()->role_id == 1)
                return $next($request);
            else
                return redirect('admin/login')->with('message','Tài khoản này không được phép truy cập!');
        }
        else
            return redirect('admin/login')->with('message','Bạn chưa đăng nhập!'); 
    }
}
