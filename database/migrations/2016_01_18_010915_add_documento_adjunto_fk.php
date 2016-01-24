<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDocumentoAdjuntoFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documento_adjunto', function(Blueprint $table) {
            $table  ->foreign('postulante','documento_adjunto_postulante_foreign')
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
        Schema::table('documento_adjunto', function(Blueprint $table) {
            $table->dropForeign('documento_adjunto_postulante_foreign');

        });
    }
}
