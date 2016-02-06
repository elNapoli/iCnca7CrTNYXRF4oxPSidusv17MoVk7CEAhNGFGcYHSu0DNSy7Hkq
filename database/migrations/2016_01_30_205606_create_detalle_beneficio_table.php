<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleBeneficioTable extends Migration {

/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_beneficio', function (Blueprint $table) {
            
            $table->increments('id');

            //Foreing Key to Asistente
            $table->integer('id_a')->unsigned(); //id_a = id asistente
            
            //Foreign Key to BENEFICIO
            $table->integer('beneficio')->unsigned();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalle_beneficio');
    }
}
