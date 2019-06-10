<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Paciente;
use App\Historial;

class PacienteController extends Controller
{
    /**
     * Muestra la lista de pacientes para el administrador
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Lista pacientes
        $paciente= Paciente::all();

        //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha listado los pacientes');

        return view('paciente.index', compact('paciente'));    
    }

    /**
     * Muestra el formulario para crear un nuevo paciente
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paciente.create');
    }

    /**
     * Almacena un nuevo paciente creado en la bd
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //Validación de datos
        $validatedData = $request->validate([
            'nombre_apellidos'=>'required|max:60',
            'SIP'=> 'required|size:8|unique:pacientes',
            'telefono'=> 'required|max:6|integer',
        ]);
        
        //Búsqueda del historial del paciente mediante el SIP
        $historial_id=Historial::select('id')->where('SIP','=',request()->SIP)->first();
    
        //Creación del paciente
        $paciente=Paciente::create([
            'nombre_apellidos' => request()->nombre_apellidos,
            'SIP' => request()->SIP,
            'telefono' => request()->telefono,
            'historial_id'=>$historial_id->id,
        ]);

         //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha creado el paciente ' . request()->nombre_apellidos);

        return redirect('/pacientes')->with('success', 'El paciente se ha creado correctamente');    
    }

    /**
     * Muestra el formulario para editar el paciente
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente=Paciente::findOrFail($id);
        return view('paciente.edit', compact('paciente'));    
    }

    /**
     * Actualiza el paciente en la bd
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validación de datos
        $validatedData = $request->validate([
            'nombre_apellidos'=>'required|max:60',
            'SIP'=> 'required|size:8',
            'telefono'=> 'required|max:6|integer',
        ]);

        Paciente::findOrFail($id)->update($validatedData);

        //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha modificado el paciente ' . request()->nombre_apellidos);

        return redirect('/pacientes')->with('success', 'El paciente se ha actualizado correctamente');
    }

    /**
     * Borra de la bd al paciente.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente=Paciente::findOrFail($id);
        $paciente->delete();

        //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha borrado el paciente con id: ' . $id);

        return redirect('/pacientes')->with('success', 'El paciente se ha borrado correctamente');
    }

    /**
     * Muestra una lista de pacientes para los administrativos
     *
     */
    public function mostrar()
    {
        $paciente= Paciente::all();

        //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha listado los pacientes');

        return view('paciente.mostrar', compact('paciente')); 
    }

     /**
     * Muestra los pacientes del médico de la sesión actual
     *
     */
    public function mispacientes()
    {
        $paciente=Paciente::mispacientes();

        //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha listado sus pacientes.');
        
        return view('paciente.mostrar', compact('paciente'));
    }
}
