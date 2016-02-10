<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampusSedeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campus_sede', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',45);
            $table->string('telefono',20);
            $table->string('fax',20);
            $table->string('sitio_web',100);

            //Foreign Key to UNIVERSIDAD
            $table->integer('universidad')->unsigned();

            //Foreign Key to CIUDAD
            $table->integer('ciudad')->unsigned();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campus_sede');
    }
}
