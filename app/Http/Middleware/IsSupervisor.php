<?php

namespace App\Http\Middleware;
use Session;
use Closure;
use Illuminate\Http\Request;

class IsSupervisor
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
        if(Session::has('email')){
            if(session()->get('role_id')==2 && session()->get('is_active')==1){
                return $next($request);
            }
            else{
                return redirect('/User_Login');
            }
        }
        else{
            return redirect('/User_Login');
        }
    }
}
