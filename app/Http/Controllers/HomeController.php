<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->rol=='administrador'){
            //Info log
            $identificador = Auth::user()->email;
            Log::info('El usuario '.$identificador . ' ha accedido al menú del administrador');
            
            return view ('homeadministrador');
        }
        else if(Auth::user()->rol=='administrativo'){
            //Info log
            $identificador = Auth::user()->email;
            Log::info('El usuario '.$identificador . ' ha accedido al menú del administrativo');

            return view ('homeadministrativo');
        }
        else if(Auth::user()->rol=='medico'){
            //Info log
            $identificador = Auth::user()->email;
            Log::info('El usuario '.$identificador . ' ha accedido al menú del médico');

            return view ('homemedico');
        }
        else{
            //Info log
            $identificador = Auth::user()->email;
            Log::info('El usuario '.$identificador . 'no tiene ningún rol para poder realizar acciones');

            return view ('auth/login');
        }
    }
}
