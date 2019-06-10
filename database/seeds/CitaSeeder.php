<?php

use Illuminate\Database\Seeder;

class CitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('citas')->delete();

    	DB::table('citas')->insert([
    		'fecha'=>'2019/06/24',
        'hora' =>'10:15',
        'medico_id'=>'4',
        'paciente_id'=>'1'
    	]);
  		

  		DB::table('citas')->insert([
    		'fecha'=>'2019/07/18',
        'hora' =>'10:45',
        'medico_id'=>'5',
        'paciente_id'=>'3'
    	]);
    }
}
