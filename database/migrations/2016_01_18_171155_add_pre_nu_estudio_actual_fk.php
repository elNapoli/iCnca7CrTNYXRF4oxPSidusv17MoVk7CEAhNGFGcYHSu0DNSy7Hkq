<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPreNuEstudioActualFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pre_nu_estudio_actual', function(Blueprint $table) {
            $table  ->foreign('postulante','pre_nu_estudio_actual_pre_no_uach_foreign')
                    ->references('postulante')
                    ->on('pre_no_uach')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION ');

            $table  ->foreign('campus_sede','pre_nu_estudio_actual_campus_sede_foreign')
                    ->references('id')
                    ->on('campus_sede')
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
        Schema::table('pre_nu_estudio_actual', function(Blueprint $table) {
            $table->dropForeign('pre_nu_estudio_actual_pre_no_uach_foreign');
            $table->dropForeign('pre_nu_estudio_actual_campus_sede_foreign');
            
        });
    }
}
