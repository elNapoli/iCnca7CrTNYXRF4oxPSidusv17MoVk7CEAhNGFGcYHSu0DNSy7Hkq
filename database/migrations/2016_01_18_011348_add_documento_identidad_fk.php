<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDocumentoIdentidadFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documento_identidad', function(Blueprint $table) {
            $table  ->foreign('postulante','documento_identidad_postulante_foreign')
                    ->references('id')
                    ->on('postulante')
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
        Schema::table('documento_identidad', function(Blueprint $table) {
            $table->dropForeign('documento_identidad_postulante_foreign');

        });
    }
}
