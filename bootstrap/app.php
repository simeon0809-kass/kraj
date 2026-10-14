<?php

use \App\Http\Middleware\CheckGuardRole;
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
    // Behind a load balancer / reverse proxy, set TRUSTED_PROXIES in .env (e.g. "*" or a comma-separated IP list)
    // so the real visitor IP is logged instead of the proxy's IP.
    if ($proxies = env('TRUSTED_PROXIES')) {
        $middleware->trustProxies(at: $proxies === '*' ? '*' : explode(',', $proxies));
    }

    $middleware->alias([
        'guard.role' => CheckGuardRole::class,
    ]);
})
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
