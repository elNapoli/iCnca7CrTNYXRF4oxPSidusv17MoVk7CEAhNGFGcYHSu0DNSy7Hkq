<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPreNuSolicitudCursoFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pre_nu_solicitud_curso', function(Blueprint $table) {
            $table  ->foreign('postulante','pre_nu_solicitud_curso_pre_no_uach_foreign')
                    ->references('postulante')
                    ->on('pre_no_uach')
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
        Schema::table('pre_nu_solicitud_curso', function(Blueprint $table) {
            $table->dropForeign('pre_nu_solicitud_curso_pre_no_uach_foreign');
            
        });
    }
}
