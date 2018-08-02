<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfAdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $auth=Auth::guard('admin');
        
    if ( $auth->check() && $auth->user()->type != 0 )
    {
        return $next($request);
    }

    return redirect('/admin');
/*
        if (!$auth->check() ) {
            return redirect('/admin');
        }
    if (  $auth->check() && $auth->user()->type==2) 
        {
      
        
            return $next($request);
        }*/
   
    }
}
