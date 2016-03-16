<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrePostulacionUniversidadFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
        Schema::table('pre_postulacion_universidad', function(Blueprint $table) {
            $table  ->foreign('postulante','pre_postulacion_universidad_pregrado_foreign')
                    ->references('postulante')
                    ->on('pregrado')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION');

            $table  ->foreign('financiamiento','pre_postulacion_universidad_financiamiento_foreign')
                    ->references('id')
                    ->on('financiamiento')
                    ->onDelete('NO ACTION')
                    ->onUpdate('NO ACTION');


            $table  ->foreign('carrera','pre_postulacion_universidad_carrera_foreign')
                    ->references('id')
                    ->on('carrera')
                    ->onDelete('NO ACTION')
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
        Schema::table('pre_postulacion_universidad', function(Blueprint $table) {
            $table->dropForeign('pre_postulacion_universidad_pregrado_foreign');
            $table->dropForeign('pre_postulacion_universidad_financiamiento_foreign');
            $table->dropForeign('pre_postulacion_universidad_carrera_foreign');
            
        });
    }
}
