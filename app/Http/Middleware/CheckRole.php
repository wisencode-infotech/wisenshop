<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {

            redirect()->route('backend.login')->with('error', 'Something went wrong');

        } else {
            
            foreach ($roles as $role) {
                if(__currentUserRole() == $role){
                     return $next($request);
                }
            }

            return redirect()->route('backend.home')->with('error', 'Something went wrong');
        }
    }
}

