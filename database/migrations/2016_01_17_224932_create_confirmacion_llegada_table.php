<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfirmacionLlegadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmacion_llegada', function (Blueprint $table) {
            //Foreign Key to PRE_UACH
            $table->integer('postulante')->unsigned();

            $table->date('fecha_llegada');
            $table->date('fecha_inicio_curso');
            $table->date('fecha_termino_curso');

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
        Schema::drop('confirmacion_llegada');
    }
}
