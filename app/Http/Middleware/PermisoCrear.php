<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PermisoCrear
{
    public function handle($request, Closure $next)
    {
        if(Auth::guest()){
            return redirect('/');
        }
        if(Auth::user()->rol->añadir == 1){
            return $next($request);
        }
        else{
            return back()->with('mensajeerror','No tienes permisos de Creación');            
        }
    }
}
