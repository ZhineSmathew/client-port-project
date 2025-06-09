<?php

use App\Http\Middleware\AdminMiddlware;
use App\Http\Middleware\IsClient;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
        'admin.only' => AdminMiddlware::class,
    ]);
    })
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
        'client.only' => IsClient::class,
    ]);
    })
    
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
