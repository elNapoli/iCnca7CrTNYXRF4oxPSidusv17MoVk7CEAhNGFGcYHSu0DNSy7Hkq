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
            $table  ->foreign('postulante','post_postulacion_universidad_postgrado_foreign')
                    ->references('postulante')
                    ->on('postgrado')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION');

            $table  ->foreign('campus_sede','post_postulacion_universidad_campus_sede_foreign')
                    ->references('id')
                    ->on('campus_sede')
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
            $table->dropForeign('post_postulacion_universidad_postgrado_foreign');
            $table->dropForeign('post_postulacion_universidad_campus_sede_foreign');
            
        });
    }
}
