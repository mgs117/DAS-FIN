<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha');
            $table->time('hora');
            $table->timestamps();

            $table->bigInteger('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->bigInteger('medico_id')->unsigned();
            $table->foreign('medico_id')->references('id')->on('usuarios')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
