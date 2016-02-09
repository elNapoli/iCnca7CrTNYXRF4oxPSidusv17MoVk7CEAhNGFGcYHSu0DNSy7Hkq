<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreNuSolicitudCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_nu_solicitud_curso', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("postulante")->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pre_nu_solicitud_curso');
    }
}
