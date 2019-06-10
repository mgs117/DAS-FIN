<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Usuario extends Authenticatable
{
    protected $fillable = ['nombre', 'apellidos', 'dni', 'rol', 'email', 'password', 'token_login'];
    
    
    
    //Relacion entre modelos
    public function citas(){
        return $this->hasMany('App\Cita');
    }
    
    protected $hidden = [
        'password', 'token_login'
    ];
    
}
