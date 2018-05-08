<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class RedirectIfNotUser
{
    
    public function handle($request, Closure $next ,$guard = 'userPanel'){
        if (Auth::guard($guard)->check()) {
            return redirect('/user/user_dashboard');
        }
        return $next($request);
    }
}
