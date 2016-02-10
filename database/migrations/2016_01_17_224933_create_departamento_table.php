<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamento', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo',45);
            $table->string('sitio_web',100);
            $table->string('nombre_encargado');
            $table->string('telefono',20);
            $table->string('email',45)->unique();

            //Foreign Key to CAMPUS_SEDE
            $table->integer('campus_sede')->unsigned();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('departamento');
    }
}
