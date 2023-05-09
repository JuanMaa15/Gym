<?php

namespace App\Http\Middleware;

use App\Models\Personal;
use App\Models\Rol;
use Closure;
use Illuminate\Http\Request;

class InstructorMiddleware
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
    
        if (!auth('personal')->check() || !auth('personal')->user() || auth('personal')->user()->tiposPersonal->rol_id != Rol::instructor) {
            return redirect('/login');
        }

        return $next($request);
    }
}
