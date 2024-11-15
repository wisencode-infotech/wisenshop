<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;

class CheckInstallation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $is_install_route = $request->is(['install', 'install/*']);

        if ($is_install_route && Storage::disk('local')->exists('.installed')) {
            return redirect()->to(route('frontend.home'));
        } else if (!$is_install_route && !Storage::disk('local')->exists('.installed')) {
            return redirect()->to(route('install.start'));
        }

        return $next($request);
    }
}
