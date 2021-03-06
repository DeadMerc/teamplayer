<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [//
    ];

    public function handle($request, \Closure $next) {
        return $this->addCookieToResponse($request, $next($request));
        //return $next($request);
    }
}
