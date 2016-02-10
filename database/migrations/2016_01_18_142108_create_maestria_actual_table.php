<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaestriaActualTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maestria_actual', function (Blueprint $table) {
            $table->increments('postulante');
            $table->string('nombre',45);
            $table->string('tipo',45);
            $table->string('nombre_tutor_director',45);
            $table->string('cargo_tutor_director',45);
            $table->string('email_tutor_director',45);
            $table->string('telefono_secretaria',20);
            $table->string('nombre_secretaria',45);
            $table->string('area',45);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('maestria_actual');
    }
}
