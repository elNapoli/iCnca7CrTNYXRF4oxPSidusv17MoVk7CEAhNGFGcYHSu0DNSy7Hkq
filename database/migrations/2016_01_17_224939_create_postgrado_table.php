<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostgradoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postgrado', function (Blueprint $table) {
            $table->string('titulo_profesional',70);

            //foreingkey to postulante
            $table->integer('postulante')->unsigned();

            //foreingkey to financiamiento
            $table->integer('financiamiento')->unsigned();


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
        Schema::drop('postgrado');
    }
}
