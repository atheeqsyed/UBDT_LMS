<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class, // Ensure authentication
        'role' => \App\Http\Middleware\RoleMiddleware::class, // Role-based middleware
        //'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
    ];
}
