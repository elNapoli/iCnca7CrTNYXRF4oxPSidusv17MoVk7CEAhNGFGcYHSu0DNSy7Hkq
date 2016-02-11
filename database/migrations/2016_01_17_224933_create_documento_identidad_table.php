<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentoIdentidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
public function up()
    {
        Schema::create('documento_identidad', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipo', ['p', 'ci']);
            $table->string('numero',20);

            //foreign key
            $table->integer('postulante')->unsigned();

        

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('documento_identidad');
    }
}
