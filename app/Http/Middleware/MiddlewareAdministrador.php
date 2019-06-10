<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MiddlewareAdministrador
{
    /**
     * Comprobación usuario autenticado y con rol administrador
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(Auth::check()){  
            if($request->user()->rol=='administrador'){
                return $next($request);
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/');
        }    
    }
}
