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
       
        // dd(app()->getLocale());
        // $locale = session('locale', config('app.locale'));
        // App::setLocale($locale);
        App::setLocale(Session::get('locale'));

        return $next($request);
    }
}
