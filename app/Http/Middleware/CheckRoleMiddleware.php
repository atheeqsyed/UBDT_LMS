<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {w
        // Ensure the user is authenticated and has the correct role
        if (!Auth::check() || Auth::user()->role !== $role) {
            return redirect()->route('dashboard')->with('error', 'Access denied.');
        }

        return $next($request);
    }
}
