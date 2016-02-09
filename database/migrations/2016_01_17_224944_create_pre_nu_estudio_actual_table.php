<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreNuEstudioActualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_nu_estudio_actual', function (Blueprint $table) {
            $table->integer('postulante')->unsigned();
            $table->string('area',45);
            $table->integer('anios_cursados');
            $table->integer('campus_sede')->unsigned();

            $table->primary('postulante');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pre_nu_estudio_actual');
    }
}
