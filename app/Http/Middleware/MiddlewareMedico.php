<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MiddlewareMedico
{
    /**
     * Comprobación usuario autenticado y con rol medico
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(Auth::check()){
            if($request->user()->rol=='medico'){
                return $next($request);
            }else{
                return redirect('/home');
            }       
        }else{
            return redirect('/');
        }    
    }
}
