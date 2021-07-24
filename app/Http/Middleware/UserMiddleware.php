<?php

namespace App\Http\Middleware;
use Session;
use Closure;
use Illuminate\Http\Request;

class UserMiddleware
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
        if(!Session::has('email')){
            
            return redirect('/User_Login');
        }
      
        return $next($request);
    }
}
