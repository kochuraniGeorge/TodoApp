<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // Check if the user is authenticated
        if (auth()->check()) {
            // User is authenticated, allow them to access the route
            return $next($request);
        }

        // User is not authenticated, redirect to the login page
        return redirect('/login');//this is redirect to route
        
    }
}
