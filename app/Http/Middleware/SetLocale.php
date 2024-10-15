<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if ( empty(app()->getLocale()) || empty(session('app_locale')) )
            session()->put('app_locale', config('app.locale', 'es'));
        
        App::setLocale(session('app_locale'), config('app.locale', 'es'));

        return $next($request);
    }
}
