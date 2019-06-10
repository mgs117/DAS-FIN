<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Cita extends Model
{
  protected $fillable = ['fecha', 'hora','paciente_id','medico_id'];

   //Relaciones entre modelos
  public function paciente(){
    return $this->belongsTo('App\Paciente');
  }

  public function medico(){
    return $this->belongsTo('App\Usuario');
  }

  //Muestra las citas que tiene el médico de la sesión actual
  public static function miscitas(){
    $id = Auth::user()->id;

    return DB::select('SELECT pacientes.nombre_apellidos, pacientes.SIP, citas.fecha, citas.hora
            FROM citas, pacientes
            WHERE citas.paciente_id = pacientes.id
            AND citas.medico_id = :id', ['id' => $id]);
	}

  //Lista con todas las citas
  public static function index(){
       return DB::select('SELECT pacientes.nombre_apellidos, pacientes.SIP, usuarios.nombre, citas.fecha, citas.hora, citas.id
            FROM citas, pacientes, usuarios
            WHERE citas.paciente_id = pacientes.id
            AND citas.medico_id = usuarios.id
            ORDER BY citas.fecha');
  }
  
}
