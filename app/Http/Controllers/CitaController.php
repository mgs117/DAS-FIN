<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Cita;
use App\Paciente;
use App\Usuario;

class CitaController extends Controller
{
    /**
     * Muestra la lista de historiales para los administrativos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Lista citas
        $cita= Cita::index();

         //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha listado los pacientes');

        return view('cita.index', compact('cita'));    
    }

    /**
     * Muestra el formulario para crear una nueva cita
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Pacientes y medicos disponibles para las citas
        $pacientes=Paciente::all();
        $medicos=Usuario::where('rol','=','medico')->get();

        return view('cita.create', compact('pacientes','medicos'));
    }

    /**
     * Almacena una nueva cita creada en la bd
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validación de datos
        $validatedData = $request->validate([
            'fecha'=> 'required|max:10|date',
            'hora'=> 'required|max:10',
            'paciente_id'=> 'required',
            'medico_id'=>'required',
        ]);
        
        //Creación de la cita
        $cita=Cita::create($validatedData);
        
         //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha creado la cita del ' . request()->fecha . ' a las ' . request()->hora . ' con el médico ' . request()->medico_id . ' y el paciente ' . request()->paciente_id);

        return redirect('/citas')->with('success', 'La cita se ha creado correctamente');
    }

    /**
     * Muestra el formulario para editar la cita.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Pacientes y medicos disponibles para la cita
        $pacientes=Paciente::all();
        $medicos=Usuario::where('rol','=','medico')->get(); 

        $cita=Cita::findOrFail($id);

        return view('cita.edit', compact('cita','pacientes','medicos'));      
    }

    /**
     * Actualiza la cita en la bd
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validación de datos
        $validatedData=$request->validate([
            'fecha'=> 'required|max:10|date',
            'hora'=> 'required|max:10',
            'paciente_id'=> 'required',
            'medico_id'=>'required',
        ]);
        Cita::findOrFail($id)->update($validatedData);

        //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha modificado la cita con id ' . $id);

        return redirect('/citas')->with('success', 'La cita se ha actualizado correctamente');
    }

    /**
     * Borra de la bd la cita
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita=Cita::findOrFail($id);
        $cita->delete();

        //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha borrado la cita con id: ' . $id);

        return redirect('/citas')->with('success', 'La cita se ha borrado correctamente');  
    }

    /**
     * Muestra las citas del médico de la sesión actual
     *
     */
    public function miscitas()
    { 
        $cita=Cita::miscitas();

        //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha listado sus citas.');

        return view('cita.mostrar', compact('cita'));
    }
}
