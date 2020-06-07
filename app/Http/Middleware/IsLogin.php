<?php

namespace App\Http\Middleware;

use Closure;

class IsLogin
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
        if(!$request->session()->has('user')){
        //$request->session()->has('user') 兼容性更好，各个版本都可
        //if (!session('user')) {
            return redirect('admin/login');
        } else {
            return $next($request);
        }
        
    }
}
