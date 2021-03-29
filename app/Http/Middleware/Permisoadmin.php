<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class Permisoadmin
{
    public function handle($request, Closure $next)
    {
        if(Auth::guest()){
            return redirect('/');
        }
        if(Auth::user()->rol->id == 1){
            return $next($request);
        }
        else{
            return back()->with('mensajeerror','No tienes privilegios de Administrador');            
        }
    }
}
