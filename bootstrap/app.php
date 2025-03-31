<?php

use App\Http\Middleware\AuthCustomMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        using: function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/solomon/solomon_api.php'));
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/heinwai/heinwai_api.php'));
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/ppm/ppm_api.php'));
            Route::middleware('web')
                ->group(base_path('routes/solomon/solomon.php'));
            Route::middleware('web')
                ->group(base_path('routes/heinwai/heinwai.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'authCustom' => AuthCustomMiddleware::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();