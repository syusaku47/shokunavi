<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     * 
     */
    protected $user_route  = 'user.login';
    protected $customer_route = 'customer.login';

    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if (Route::is('user.login')) {
                return route($this->user_route);
            } elseif (Route::is('customer.login')) {
                return route($this->customer_route);
            }
        }
    }
}
