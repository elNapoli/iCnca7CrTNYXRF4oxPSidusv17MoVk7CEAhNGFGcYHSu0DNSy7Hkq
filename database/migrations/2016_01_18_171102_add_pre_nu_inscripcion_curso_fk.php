<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPreNuInscripcionCursoFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pre_nu_inscripcion_curso', function(Blueprint $table) {
            $table  ->foreign('detalle_solicitud_curso','pre_nu_inscripcion_curso_detalle_solicitud_curso_foreign')
                    ->references('id')
                    ->on('detalle_solicitud_curso')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pre_nu_inscripcion_curso', function(Blueprint $table) {
            $table->dropForeign('pre_nu_inscripcion_curso_detalle_solicitud_curso_foreign');
            
        });
    }
}
