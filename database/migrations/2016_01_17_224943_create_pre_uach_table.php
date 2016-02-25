<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreUachTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_uach', function (Blueprint $table) {
            $table->integer('postulante')->unsigned();
            $table->string('email_institucional', 45);
            $table->string('grupo_sanguineo', 45);
            $table->string('enfermedades', 45);
            $table->string('telefono',20);
            $table->string('direccion',45);
            $table->integer('ciudad')->unsigned();

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
        Schema::drop('pre_uach');
    }
}
