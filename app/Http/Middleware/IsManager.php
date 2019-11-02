<?php

namespace App\Http\Middleware;

use Closure;

class IsManager
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
        if(\Auth::check() && \Auth::User()->role_id==3){ // check role =2 mới là Manager
            return $next($request);
        }
        return redirect()->route('home');
    }
}
