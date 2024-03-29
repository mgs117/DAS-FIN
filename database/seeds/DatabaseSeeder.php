<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsuarioSeeder::class);
        $this->call(HistorialSeeder::class);
        $this->call(PacienteSeeder::class);
        $this->call(CitaSeeder::class);
    }
}
