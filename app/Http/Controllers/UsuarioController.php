<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Usuario;

class UsuarioController extends Controller
{
    /**
     * Muestra la lista de usuarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Lista usuarios
        $usuario= Usuario::all();

        //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario ' . $identificador . ' ha listado los usuarios');

        return view('usuario.index', compact('usuario'));

    }

    /**
     * Muestra el formulario para crear un nuevo usuario
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Almacena un nuevo usuario creado en la bd
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validacion de datos
        $validatedData = $request->validate([
            'dni'=> 'required|size:9|unique:usuarios|alpha_num',
            'nombre'=>'required|max:60',
            'email'=> 'required|max:30|email|unique:usuarios',
            'password' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'rol'=>'required|max:15|alpha',
            'especialidad'=>'max:15|alpha',
        ]);

        //Creacion del usuario  
        $usuario=Usuario::create([
            'nombre' => request()->nombre,
            'dni' => request()->dni,
            'email' => request()->email,
            'password' => Hash::make((request()->get('password'))),
            'rol' => request()->rol,
            'especialidad' => request()->especialidad,
        ]);

        //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha creado el usuario ' . request()->nombre);

        return redirect('/usuarios')->with('success', 'El usuario se ha creado correctamente');
    }

     /**
     * Muestra los datos de un usuario
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::find($id);

        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha visto los datos del usuario con id ' . $id);

        return view('usuario.show')->with('usuario', $usuario);
    } 

    /**
     * Muestra el formulario para editar el usuario 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario=Usuario::findOrFail($id);
        return view('usuario.edit', compact('usuario'));
    }

    /**
     * Actualiza el usuario en la bd
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validación de datos
        $validatedData=$request->validate([
            'dni'=> 'required|size:9|alpha_num',
            'nombre'=>'required|max:60',
            'email'=> 'required|max:30|email',
            'rol'=>'required|max:15|alpha',
            'especialidad'=>'max:15|alpha',
        ]);

        //Edición de los campos del usuario   
        $usuario=Usuario::findOrFail($id);
        $usuario->nombre=$request->input('nombre');
        $usuario->dni=$request->input('dni');
        $usuario->email=$request->input('email');
        $usuario->rol=$request->input('rol');
        $usuario->especialidad=$request->input('especialidad');
        if(!empty($request->input('password'))){
            $validatedData=$request->validate([
            'password' => 'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X])(?=.*[!$#%]).*$/',
            ]);
            $usuario->password=Hash::make((request()->get('password')));
        }
        $usuario->save();

        //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha modificado el usuario ' . request()->nombre);
        
        return redirect('/usuarios')->with('success', 'El usuario se ha actualizado correctamente');
    }

    /**
     * Borra de la bd al usuario
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario=Usuario::findOrFail($id);
        $usuario->delete();

        //Info log
        $identificador = Auth::user()->email;
        Log::info('El usuario '.$identificador . ' ha modificado el usuario con la id ' . $id);
        
        return redirect('/usuarios')->with('success', 'El usuario se ha borrado correctamente');
    }
}
