<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cityAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if(!$request->session()->has('city')){
            return redirect('/');
        }

        return $next($request);

    }
}
