<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @ param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * dejar Auth::user, metodo propio de Auth
     */
    
    public function handle( $request, Closure $next,$rol)
    {
        if(!Auth::check() || Auth::user()->rol !== $rol){
            abort(403, 'No tienes permiso para acceder.');
        }
        return $next($request);
    }
}
