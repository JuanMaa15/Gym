<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Http\Request;

class Authenticate /* extends Middleware */
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */


    /* protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }

        if (!auth()->check() || !auth('personal')->check()) {
            return 'login';
        }

    } */


    public function handle(Request $request, Closure $next)
    {
        
        if (!auth('web')->check() && !auth('personal')->check()) {
            
            return redirect('/login');
        }
        
         return $next($request);

    }
}
