<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if(\Auth::check() && \Auth::User()->role_id==1){ // check role =1 mới là admin
            return $next($request);
        }
        return redirect()->route('home');
    }
}
