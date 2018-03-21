<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class IsAdminMiddleware
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
        if(!Auth::check() || Auth::user()->role_id != '1'){
            return redirect()->route('login');
        }
        return $next($request);
    }
}
