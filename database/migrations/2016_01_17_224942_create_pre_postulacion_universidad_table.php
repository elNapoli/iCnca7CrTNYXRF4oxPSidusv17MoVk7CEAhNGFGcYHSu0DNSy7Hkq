<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrePostulacionUniversidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_postulacion_universidad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('postulante')->unsigned();
            $table->enum('semestre', ['semestre 1', 'semestre 2','ambos']);
            $table->date('desde');
            $table->date('hasta');

            //foreingkey to financiamiento
            $table->integer('financiamiento')->unsigned();

            //foreingkey to carrera
            $table->integer('carrera')->unsigned();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pre_postulacion_universidad');
    }
}
