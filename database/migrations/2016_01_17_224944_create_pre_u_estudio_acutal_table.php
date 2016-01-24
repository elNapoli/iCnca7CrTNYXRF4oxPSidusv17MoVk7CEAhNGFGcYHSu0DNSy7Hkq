<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreUEstudioAcutalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_u_estudio_actual', function (Blueprint $table) {
            $table->integer('postulante')->unsigned();
            $table->integer('carrera')->unsigned();
            $table->integer('anio_ingreso');
            $table->integer('ranking');
            $table->string('beneficios',45);

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
        Schema::drop('pre_u_estudio_actual');
    }
}
