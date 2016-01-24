<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreNuInscripcionCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_nu_inscripcion_curso', function (Blueprint $table) {
            $table->integer('detalle_solicitud_curso')->unsigned();
            $table->string('profesor',45);

            $table->primary('detalle_solicitud_curso');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pre_nu_inscripcion_curso');
    }
}
