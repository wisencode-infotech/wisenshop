<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotLoggedIn
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
        // Check if the user is not logged in
        if (!Auth::check()) {
            // Redirect to the homepage if not authenticated
            return redirect()->intended('/');
        }

        // Proceed with the request if authenticated
        return $next($request);
    }
}
