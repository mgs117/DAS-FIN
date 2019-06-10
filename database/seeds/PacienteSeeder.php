<?php

use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pacientes')->delete();

        DB::table('pacientes')->insert([
        	'nombre_apellidos' =>'Alfonso Campos Cruz',
            'SIP'=>'12345678',
        	'telefono' =>'665487235',
            'historial_id'=>'1',
        ]);

        DB::table('pacientes')->insert([
        	'nombre_apellidos' =>'Marta Castillo Maestre ',
            'SIP'=>'52147854',
        	'telefono' =>'666587584',
            'historial_id'=>'2',
        ]);

        DB::table('pacientes')->insert([
        	'nombre_apellidos' =>'Sofía Rincón Malagón',
            'SIP'=>'87548987',
        	'telefono' =>'665325645',
            'historial_id'=>'3',
        
        ]);

        DB::table('pacientes')->insert([
        	'nombre_apellidos' =>'Alberto Rubio Boix',
            'SIP'=>'98547821',
        	'telefono' =>'669856642',
            'historial_id'=>'4',
        ]);

        DB::table('pacientes')->insert([
        	'nombre_apellidos' =>'Ana Valle Moreno',
            'SIP'=>'77458742',
        	'telefono' =>'669895123',
            'historial_id'=>'5',
        ]);

        DB::table('pacientes')->insert([
        	'nombre_apellidos' =>'Alejandro Fenoll Falcó',
            'SIP'=>'65587414',
        	'telefono' =>'665874545',
            'historial_id'=>'6',
        ]);

        DB::table('pacientes')->insert([
        	'nombre_apellidos' =>'Gema Ferrero Pascual',
            'SIP'=>'87521545',
        	'telefono' =>'669851254',
            'historial_id'=>'7',
        ]);

        DB::table('pacientes')->insert([
        	'nombre_apellidos' =>'Elena Santos Ruíz',
            'SIP'=>'75412545',
        	'telefono' =>'665332287',
            'historial_id'=>'8',
        ]);
    }
}
