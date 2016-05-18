<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMaestriaPostulacionFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maestria_postulacion', function(Blueprint $table) {
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

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maestria_postulacion', function(Blueprint $table) {
            $table->dropForeign('maestria_poestulacion_postgrado_foreign');
            $table->dropForeign('maestria_maestria_facultad_foreign');

        });
    }
}
