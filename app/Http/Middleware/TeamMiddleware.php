<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TeamMiddleware
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


        if(Auth::check())
        {
            if(Auth::user()->role_id == '3')
            {
                return $next($request);
            }

            
            elseif(Auth::user()->role_id == '0')
            {
                
                return $next($request);
            }
            elseif(Auth::user()->role_id == '1')
            {
                
                return $next($request);
            }
            else
            {
             return redirect('/login')->with('status','Access Denied! as you are not as admin');
            }
        }
       
        
    }
    
}
