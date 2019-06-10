<?php

namespace App;
use DB;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Cita;
use App\Paciente;
use App\Usuario;

class Historial extends Model
{

    protected $fillable = ['SIP', 'nif', 'sexo', 'edad', 'peso', 'altura', 'grupo_sanguineo','alergias','intervenciones','enfermedades'];
    
    protected $encryptable = ['grupo_sanguineo', 'alergias', 'intervenciones', 'enfermedades'];
    
    //Relación entre modelos
    public function paciente(){
    	return $this->belongsTo('App\Paciente');
    }

    //Mostrar historiales del médico de la sesión actual
    public static function mishistoriales(){
       $medico = Auth::user()->id;

        return DB::select('SELECT pacientes.nombre_apellidos, historials.SIP, historials.nif, historials.sexo, historials.edad, historials.peso, historials.altura, historials.grupo_sanguineo, historials.alergias, historials.intervenciones, historials.enfermedades
            FROM citas, historials, pacientes
            WHERE citas.paciente_id = pacientes.id
            AND historials.id = pacientes.historial_id
            AND citas.medico_id = :id', ['id' => $medico]);
    }
}
