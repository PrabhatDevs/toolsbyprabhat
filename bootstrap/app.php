<?php

use App\Http\Middleware\JsonAuthMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'json_auth' => JsonAuthMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // // We use the 'render' method specifically for Throwable errors
        // $exceptions->render(function (\Throwable $e, \Illuminate\Http\Request $request) {

        //     // Only trigger JSON redirect if it's an AJAX call
        //     if ($request->expectsJson()) {
        //         return response()->json([
        //             'status' => 'error',
        //             'redirect_url' => url('/system-error'), // Using url() is safer if route() isn't cached
        //             'message' => 'System Relay Interrupted'
        //         ], 500);
        //     }
        // });
    })->create();
