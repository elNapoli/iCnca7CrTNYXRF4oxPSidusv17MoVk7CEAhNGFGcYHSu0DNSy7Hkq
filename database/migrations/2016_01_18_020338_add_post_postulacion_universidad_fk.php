<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostPostulacionUniversidadFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_postulacion_universidad', function(Blueprint $table) {

            $table  ->foreign('postulante','maestria_poestulacion_postgrado_foreign')
                    ->references('postulante')
                    ->on('postgrado')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION');


            $table  ->foreign('facultad','maestria_maestria_facultad_foreign')
                    ->references('id')
                    ->on('facultad')
                    ->onDelete('NO ACTION')
                    ->onUpdate('NO ACTION');
            $table  ->foreign('financiamiento','post_postulacion_universidad_financiamiento_foreign')
                    ->references('id')
                    ->on('financiamiento')
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
        Schema::table('post_postulacion_universidad', function(Blueprint $table) {
            $table->dropForeign('maestria_poestulacion_postgrado_foreign');
            $table->dropForeign('maestria_maestria_facultad_foreign');
            $table->dropForeign('post_postulacion_universidad_financiamiento_foreign');
            
        });
    }
}
