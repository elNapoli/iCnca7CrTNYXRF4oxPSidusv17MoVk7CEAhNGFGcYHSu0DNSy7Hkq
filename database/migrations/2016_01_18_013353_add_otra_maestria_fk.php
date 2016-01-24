<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtraMaestriaFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('otra_maestria', function(Blueprint $table) {
            $table  ->foreign('postulante','otra_maestria_maestria_postulacion_foreign')
                    ->references('postulante')
                    ->on('maestria_postulacion')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION');

            $table  ->foreign('facultad','otra_maestria_maestria_facultad_foreign')
                    ->references('id')
                    ->on('facultad')
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
        Schema::table('otra_maestria', function(Blueprint $table) {
            $table->dropForeign('otra_maestria_maestria_postulacion_foreign');
            $table->dropForeign('otra_maestria_maestria_facultad_foreign');

        });
    }
}
