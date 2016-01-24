<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetalleSolicitudCursoFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalle_solicitud_curso', function(Blueprint $table) {
            $table  ->foreign('solicitud_curso','detalle_solicitud_curso_pre_nu_solicitud_foreign')
                    ->references('id')
                    ->on('pre_nu_solicitud_curso')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION');

            $table  ->foreign('asignatura','detalle_solicitud_curso_asignatura_foreign')
                    ->references('codigo')
                    ->on('asignatura')
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
        Schema::table('detalle_solicitud_curso', function(Blueprint $table) {
            $table->dropForeign('detalle_solicitud_curso_pre_nu_solicitud_foreign');
            $table->dropForeign('detalle_solicitud_curso_asignatura_foreign');
        });
    }
}
