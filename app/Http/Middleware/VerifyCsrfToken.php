<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://orchard.606.co.il/*',
        'http://127.0.0.1:8000/*',
        'http://127.0.0.1:3000/*',
        'http://127.0.0.1:3001/*',
        'http://127.0.0.1:8000/*',
    ];
}
