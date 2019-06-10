<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('usuarios')->delete();
        //Añadimos datos
        DB::table('usuarios')->insert([
        	'dni'=>'74747474M',
        	'nombre'=>'Marga Guerrero Selva',
        	'email'=>'marga@gmail.com',
        	'password'=>Hash::make('pass'),
        	'rol'=>'administrador',]);
    	

    	DB::table('usuarios')->insert([
        	'dni'=>'36363636B',
        	'nombre'=>'Jessica Montero Valencia',
        	'email'=>'jessica@gmail.com',
        	'password'=>Hash::make('pass'),
        	'rol'=>'administrativo',]);
    	

    	DB::table('usuarios')->insert([
        	'dni'=>'24562841S',
        	'nombre'=>'María López Sánchez',
        	'email'=>'maria@gmail.com',
        	'password'=>Hash::make('pass'),
        	'rol'=>'medico',
            'especialidad'=>'cardiología',
        ]);
    	

		DB::table('usuarios')->insert([
        	'dni'=>'74589501F',
        	'nombre'=>'Antonio Pérez García',
        	'email'=>'antonio@gmail.com',
        	'password'=>Hash::make('pass'),
        	'rol'=>'medico',
            'especialidad'=>'traumatología',
        ]);
    	

    	DB::table('usuarios')->insert([
        	'dni'=>'45898741J',
        	'nombre'=>'Pedro Rubio Pascual',
        	'email'=>'pedro@gmail.com',
        	'password'=>Hash::make('pass'),
        	'rol'=>'medico',
            'especialidad'=>'cardiología',
        ]);
    	

    	DB::table('usuarios')->insert([
        	'dni'=>'48475210N',
        	'nombre'=>'Carlos Amat Oliva',
        	'email'=>'carlos@gmail.com',
        	'password'=>Hash::make('pass'),
        	'rol'=>'medico',
            'especialidad'=>'dermatología',
        ]);
    }
}
