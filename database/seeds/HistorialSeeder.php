<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class HistorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('historials')->delete();

    	DB::table('historials')->insert([
    		'SIP'=>'12345678',
            'nif'=>'74545452C',
    		'sexo'=>'hombre',
    		'edad'=>'55',
    		'alergias'=>Crypt::encrypt('ibuprofeno'),
    		'peso'=>'75',
    		'altura'=>'173',
    		'grupo_sanguineo'=>Crypt::encrypt('B-'),
    		'intervenciones'=>Crypt::encrypt('apendicectomia'),
            'enfermedades'=>Crypt::encrypt('ninguna')
    	]);

    	DB::table('historials')->insert([
    		'SIP'=>'52147854',
            'nif'=>'45458742V',
    		'sexo'=>'mujer',
    		'edad'=>'26',
    		'alergias'=>Crypt::encrypt('penicilina'),
    		'peso'=>'61',
    		'altura'=>'168',
    		'grupo_sanguineo'=>Crypt::encrypt('0+'),
            'intervenciones'=>Crypt::encrypt('ninguna'),
            'enfermedades'=>Crypt::encrypt('ninguna')
    	]);

    	DB::table('historials')->insert([
    		'SIP'=>'87548987',
            'nif'=>'74589654E',
    		'sexo'=>'mujer',
    		'edad'=>'32',
    		'alergias'=>Crypt::encrypt('apirina'),
    		'peso'=>'69',
    		'altura'=>'164',
    		'grupo_sanguineo'=>Crypt::encrypt('0-'),
    		'intervenciones'=>Crypt::encrypt('otoplastia'),
    		'enfermedades'=>Crypt::encrypt('asma')
    	]);

    	DB::table('historials')->insert([
    		'SIP'=>'98547821',
            'nif'=>'22451458B',
    		'sexo'=>'hombre',
    		'edad'=>'28',
    		'alergias'=>Crypt::encrypt('lactosa'),
    		'peso'=>'80',
    		'altura'=>'177',
    		'grupo_sanguineo'=>Crypt::encrypt('A+'),
            'intervenciones'=>Crypt::encrypt('ninguna'),
            'enfermedades'=>Crypt::encrypt('migraña')
    	]);

    	DB::table('historials')->insert([
    		'SIP'=>'77458742',
            'nif'=>'23654785L',
    		'sexo'=>'mujer',
    		'edad'=>'67',
    		'alergias'=>Crypt::encrypt('pistachos'),
    		'peso'=>'72',
    		'altura'=>'165',
    		'grupo_sanguineo'=>Crypt::encrypt('A-'),
    		'intervenciones'=>Crypt::encrypt('cirugia de cataratas'),
    		'enfermedades'=>Crypt::encrypt('diabetes'),
    	]);

    	DB::table('historials')->insert([
    		'SIP'=>'65587414',
            'nif'=>'45458793G',
    		'sexo'=>'hombre',
    		'edad'=>'59',
    		'alergias'=>Crypt::encrypt('lactosa'),
    		'peso'=>'82',
    		'altura'=>'178',
    		'grupo_sanguineo'=>Crypt::encrypt('0+'),
    		'intervenciones'=>Crypt::encrypt('hemorroidectomia'),
    		'enfermedades'=>Crypt::encrypt('bronquitis')
    	]);

    	DB::table('historials')->insert([
    		'SIP'=>'87521545',
            'nif'=>'47547931V',
    		'sexo'=>'mujer',
    		'edad'=>'43',
    		'alergias'=>Crypt::encrypt('ibuprofeno'),
    		'peso'=>'59',
    		'altura'=>'170',
    		'grupo_sanguineo'=>Crypt::encrypt('AB+'),
    		'intervenciones'=>Crypt::encrypt('cesarea'),
    		'enfermedades'=>Crypt::encrypt('dermatitis atópica')
    	]);

    	DB::table('historials')->insert([
    		'SIP'=>'75412545',
            'nif'=>'47451239W',
    		'sexo'=>'mujer',
    		'edad'=>'23',
            'alergias'=>Crypt::encrypt('ninguna'),
    		'peso'=>'60',
    		'altura'=>'174',
    		'grupo_sanguineo'=>Crypt::encrypt('B+'),
    		'intervenciones'=>Crypt::encrypt('amigdalectomia'),
            'enfermedades'=>Crypt::encrypt('ninguna')
    	]);
    }
}
