<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias', function(Blueprint $table)
        {
            $table->increments('id');

            //Foreign Key to USUARIOS
            $table->integer('user')->unsigned(); 
            $table->string('cuerpo'); 
            $table->string('resumen'); 
            $table->string('titulo',100);
            $table->string('foto',100); //path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('noticias');
    }
}
