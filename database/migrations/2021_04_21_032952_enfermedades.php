<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Enfermedades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enfermedades', function (Blueprint $table) {
            $table->increments('idEnfermedad');
            $table->string('nombre');
            $table->text('descripcion');
            $table->unsignedInteger('idTipo');
            $table->foreign('idTipo')->references('idTipo')->on('tipos_enfermedades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enfermedades');
    }
}
