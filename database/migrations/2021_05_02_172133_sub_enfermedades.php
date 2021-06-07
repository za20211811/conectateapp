<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubEnfermedades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subenfermedades', function (Blueprint $table) {
            $table->increments('idSubEnfermedad');
            $table->string('nombre');
            $table->unsignedInteger('idEnfermedad');
            $table->foreign('idEnfermedad')->references('idEnfermedad')->on('enfermedades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subenfermedades');
    }
}
