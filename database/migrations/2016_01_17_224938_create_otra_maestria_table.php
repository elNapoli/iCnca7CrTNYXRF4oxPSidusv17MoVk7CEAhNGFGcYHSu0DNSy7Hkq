<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtraMaestriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otra_maestria', function (Blueprint $table) {
            //foreing key to maestria_postulacion
            $table->increments('postulante');
            $table->string('nombre',45);
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
        Schema::drop('otra_maestria');
    }
}


