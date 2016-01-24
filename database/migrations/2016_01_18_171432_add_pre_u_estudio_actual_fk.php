<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPreUEstudioActualFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pre_u_estudio_actual', function(Blueprint $table) {
            $table  ->foreign('postulante','pre_u_estudio_actual_pre_uach_foreign')
                    ->references('postulante')
                    ->on('pre_uach')
                    ->onDelete('CASCADE')
                    ->onUpdate('no action');

            $table  ->foreign('carrera','pre_u_estudio_actual_carrera_foreign')
                    ->references('id')
                    ->on('carrera')
                    ->onDelete('CASCADE')
                    ->onUpdate('no action');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pre_u_estudio_actual', function(Blueprint $table) {
            $table->dropForeign('pre_u_estudio_actual_pre_uach_foreign');
            $table->dropForeign('pre_u_estudio_actual_carrera_foreign');
            
        });
    }
}
