<?php

namespace App\Http\Middleware;

use App\Models\Personal;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
    
        if (!auth('personal')->check() || !auth('personal')->user() || auth('personal')->user()->tiposPersonal->rol_id != 2) {
            return redirect('/login');
        }

        return $next($request);

    }
}
