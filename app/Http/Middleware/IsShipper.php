<?php

namespace App\Http\Middleware;

use Closure;

class IsShipper
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
        if(\Auth::check() && \Auth::User()->role_id==4){ // check role =4  mới là Shipper
            return $next($request);
        }
        return redirect()->route('home');
    }
}
