<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaestriaPostulacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maestria_postulacion', function (Blueprint $table) {
            $table->increments('postulante');
            $table->string('tipo',45);
            $table->integer('anio');
            $table->enum('duracion', ['semestre_1', 'semestre_2','semestre_3','semestre_4','otro']);
            $table->date('desde');
            $table->date('hasta');
             //foreing key to maestria_postulacion
            $table->string('nombre_maestria',45);
            $table->string('laboratorio',45);
            $table->string('contacto_uach',45);
            $table->string('instituto',45);
            //$table->integer('facultad')->index();
            $table->unsignedinteger("facultad")->index();
            
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('maestria_postulacion');
    }
}
