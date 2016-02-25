<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleSolicitudCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_solicitud_curso', function (Blueprint $table) {
            $table->increments('id');

            //foreign key to pre_nu_solicitud_curso
            $table->integer('solicitud_curso')->unsigned();

            //foreign key asignatura
            $table->string('asignatura',10)->index();

            $table->string('observaciones');
            $table->enum('aceptado',['si','no'])->default('no');

        });   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalle_solicitud_curso');
    }
}
