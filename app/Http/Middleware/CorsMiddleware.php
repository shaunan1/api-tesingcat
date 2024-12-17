<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    // Di file app/Http/Middleware/VerifyCsrfToken.php
    protected $except = [
        'api/*'
    ];

    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');

        return $response;
    }
}
