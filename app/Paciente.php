<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Cita;
use App\Usuario;

class Paciente extends Model
{
    protected $fillable = ['nombre_apellidos', 'SIP', 'telefono', 'historial_id',];

    //Relaciones entre modelos
    public function historial(){
        return $this->hasOne('App\Historial');
    }

    public function citas(){
        return $this->hasMany('App\Cita');
    }

    //Mostrar pacientes del médico con la sesión actual
    public static function mispacientes(){
        $medico = Auth::user()->id;
        
        return DB::select('SELECT pacientes.nombre_apellidos, pacientes.SIP, pacientes.telefono
            FROM citas, pacientes
            WHERE citas.paciente_id = pacientes.id
            AND citas.medico_id = :id', ['id' => $medico]);
    }
}
