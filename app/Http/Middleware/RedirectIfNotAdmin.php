<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
    public function handle($request, Closure $next ,  $guard = 'admin') {
        // dd(Auth::guard($guard)->check());
        if (Auth::guard($guard)->check()) {
            return redirect('/admin/admin_dashboard');
        }
        return $next($request);
    }
}
