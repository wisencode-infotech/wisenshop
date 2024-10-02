<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Middleware\CheckAbilities;
use Laravel\Sanctum\Http\Middleware\CheckForAnyAbility;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware(['web'])
                ->prefix('/')
                ->name('frontend.')
                ->group(base_path('routes/frontend.php'));

            Route::middleware(['web'])
                ->prefix('backend')
                ->name('backend.')
                ->namespace('App\\Http\\Controllers\\Backend')
                ->group(base_path('routes/backend.php'));

            Route::middleware('auth:sanctum')
                ->prefix('api')
                ->name('api.')
                ->group(base_path('routes/api.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'locale' => SetLocale::class,
            'abilities' => CheckAbilities::class,
            'ability' => CheckForAnyAbility::class,
        ]);

        $middleware->redirectGuestsTo(fn (Request $request) => route('backend.login'));
        $middleware->redirectUsersTo(fn (Request $request) => route('backend.home'));
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
