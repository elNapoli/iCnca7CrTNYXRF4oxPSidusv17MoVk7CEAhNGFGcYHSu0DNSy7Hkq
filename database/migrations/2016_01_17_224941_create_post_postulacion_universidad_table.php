<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostPostulacionUniversidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_postulacion_universidad', function (Blueprint $table) {
            $table->string('celular',20);
            $table->integer('postulante')->unsigned();
            $table->string('tipo',45);
            $table->integer('anio');
            $table->enum('duracion', ['semestre_1', 'semestre_2','semestre_3','semestre_4','otro']);
            $table->date('desde');
            $table->date('hasta');
             //foreing key to maestria_postulacion
            $table->integer('financiamiento')->unsigned();
            $table->string('nombre_maestria',45);
            $table->string('laboratorio',45);
            $table->string('contacto_uach',45);
            $table->string('instituto',45);
            $table->string('area',45);
            //$table->integer('facultad')->index();
            $table->unsignedinteger("facultad")->index();
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
        Schema::drop('post_postulacion_universidad');
    }
}
