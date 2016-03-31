<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonio', function(Blueprint $table)
        {
            $table->increments('id');

            //Foreign Key to POSTULANTE
            $table->integer('postulante')->unsigned();
            $table->string('cuerpo');
            $table->string('foto',100); //path
            $table->string('video',100);//path
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
        Schema::drop('testimonio');
    }
}
