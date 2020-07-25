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
        'user/reg',
        'user/login',
        'user/create',
        'user/goods',
        'user/blacklist',
        'user/qiandao',
        'test5',
        'test3',
        'test4',
        'ace',
        'aest',
        'sign1'
    ];
}
