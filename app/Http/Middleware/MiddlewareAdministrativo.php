<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MiddlewareAdministrativo
{
    /**
     * Comprobación usuario autenticado y con rol administrativo
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(Auth::check()){
            if($request->user()->rol=='administrativo'){
                return $next($request);
            }else{
                return redirect('/home');
            }
        }else{
            return redirect('/');
        }
    }
}
