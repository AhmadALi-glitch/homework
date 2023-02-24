<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
 
    protected $except = [
        'login',
        'register',
        'show-product',
        'get-products',
        'store-product',
        'update-product',
        'delete-product',
       
    ];
}
