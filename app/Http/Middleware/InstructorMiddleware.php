<?php

namespace App\Http\Middleware;

use App\Models\Personal;
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
        //Buscar el usuario autenticado
        $user = Personal::find( auth()->user()->id );

    
        if (!auth()->check() || empty($user) || $user->tiposPersonal->rol_id != 1) {
            return route('login');
        }

        return $next($request);
    }
}
