<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        //DIR_ is kinda same as base_path both provide full url c:/xamp/htdocs..
        web: __DIR__ . '/../routes/web.php', //load web route with web middleware
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            //apply these middleware where web provide session,flash,cookies
            //auth checks for the authentication 
            //admin is custom middleware we will be adding
            Route::middleware(['web', 'auth', 'admin'])
                ->prefix('admin') //add prefix admin/ for this group
                ->name('admin.') //add admin. in prefix in name for this group
                ->group(base_path('routes/admin.php')); //so all those above middleware prefix name and .. apply in this group.i.e admin route
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias(
            [
                'admin' => \App\Http\Middleware\AdminMiddleware::class,
            ]
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
