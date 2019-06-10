<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('SIP');
            $table->string('nif');
            $table->string('sexo');
            $table->integer('edad');
            $table->string('alergias')->nullable();
            $table->decimal('peso');
            $table->decimal('altura');
            $table->string('grupo_sanguineo');
            $table->string('intervenciones')->nullable();
            $table->string('enfermedades')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historials');
    }
}
