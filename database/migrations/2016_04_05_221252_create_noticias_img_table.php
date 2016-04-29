<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticiasImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias_img', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nombre',45);
            $table->string('path',255)->unique();

            //foreign key to postulante
            $table->integer('autor')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('noticias_img');
    }
}
