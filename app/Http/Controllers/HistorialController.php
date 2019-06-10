<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Historial;

class HistorialController extends Controller
{
    /**
     * Muestra la lista de historiales para el admin.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Lista historiales        
        $historial= Historial::all();

         //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario ' . $identificador . ' ha listado los historiales');

        return view('historial.index', compact('historial'));
    }

    /**
     * Muestra el formulario para crear un nuevo historial
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('historial.create');
    }

    /**
     * Almacena un nuevo historial creado en la bd.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validación de datos
        $validatedData = $request->validate([
            'SIP'=>'required|size:8',
            'nif'=> 'required|size:9|alpha_num',
            'sexo'=> 'required|max:6|alpha',
            'edad'=> 'required|integer',
            'alergias'=> 'max:50',
            'peso'=>'required|numeric',
            'altura'=>'required|numeric',
            'grupo_sanguineo'=>'required|max:3',
            'intervenciones'=>'max:50',
            'enfermedades'=>'max:50',
        ]);
        
        //creación del historial
        $historial=new Historial;
        $historial->SIP=$request->SIP;
        $historial->nif=$request->nif;
        $historial->sexo=$request->sexo;
        $historial->edad=$request->edad;
        $historial->alergias=Crypt::encrypt($request->input('alergias'));
        $historial->peso=$request->peso;
        $historial->altura=$request->altura;
        $historial->grupo_sanguineo=Crypt::encrypt($request->input('grupo_sanguineo'));
        $historial->intervenciones=Crypt::encrypt($request->input('intervenciones'));
        $historial->enfermedades=Crypt::encrypt($request->input('enfermedades'));
        $historial->save();
    
        //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha creado el historial del paciente con SIP ' . request()->SIP);

        return redirect('/historiales')->with('success', 'El historial se ha creado correctamente');    
    }    

    /**
     * Muestra el formulario para editar el historial
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $historial=Historial::findOrFail($id);
        return view('historial.edit', compact('historial'));
    }

    /**
     * Actualiza el historial en la bd
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validación de datos
        $validatedData = $request->validate([
            'SIP'=>'required|size:8',
            'nif'=> 'required|size:9|alpha_num',
            'sexo'=> 'required|max:6|alpha',
            'edad'=> 'required|integer',
            'alergias'=> 'max:50',
            'peso'=>'required|numeric',
            'altura'=>'required|numeric',
            'grupo_sanguineo'=>'required|max:3',
            'intervenciones'=>'max:50',
            'enfermedades'=>'max:50',
        ]);  

        //Edición de los campos del historial   
        $historial=Historial::findOrFail($id);
        $historial->SIP=$request->input('SIP');
        $historial->nif=$request->input('nif');
        $historial->sexo=$request->input('sexo');
        $historial->edad=$request->input('edad');
        $historial->alergias=Crypt::encrypt($request->input('alergias'));
        $historial->peso=$request->input('peso');
        $historial->altura=$request->input('altura');
        $historial->grupo_sanguineo=Crypt::encrypt($request->input('grupo_sanguineo'));
        $historial->intervenciones=Crypt::encrypt($request->input('intervenciones'));
        $historial->enfermedades=Crypt::encrypt($request->input('enfermedades'));
        $historial->save();
    
         //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha modificado el historial del paciente con SIP ' . request()->SIP);

        return redirect('/historiales')->with('success', 'El historial se ha actualizado correctamente');

    }

    /**
     * Borra de la bd el historial
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $historial=Historial::findOrFail($id);
        $historial->delete();

          //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha modificado el historial con la id ' . $id);

        return redirect('/historiales')->with('success', 'El historial se ha borrado correctamente');
    }

     /**
     * Muestra los historiales de los pacientes del médico con la sesión actual
     *
     */
    public function mishistoriales()
    {
        $historiales=Historial::mishistoriales();
        
        //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha listado los historiales de sus pacientes');

        return view('historial.mostrar', compact('historiales'));
    }
}
