<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'payment-redirect*',
        'stripe/success*',
        'create/team/pay/success*',
        'stripe/upgrade/success*',
        'stripe*',
        '/stripe/success',
        '/stripe/failure',
    ];
}
