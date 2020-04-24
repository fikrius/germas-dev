<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Relawan
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
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(Auth::user()->roles == 1){
            return redirect()->route('home');
        }

        if(Auth::user()->roles == 2){
            return $next($request);
        }
    }
}
