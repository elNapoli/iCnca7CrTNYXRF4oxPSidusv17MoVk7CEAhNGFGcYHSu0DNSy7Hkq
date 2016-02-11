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
            $table->integer('campus_sede')->unsigned();

            //pk 
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
