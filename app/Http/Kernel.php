<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Http\Middleware\HandleCors;

class Kernel extends HttpKernel
{
    protected $middleware = [
        \Illuminate\Http\Middleware\HandleCors::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\VerifyCsrfToken::class,
        ],
        'api' => [
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];
}
