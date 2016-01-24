<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConfirmacionLlegadaFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('confirmacion_llegada', function(Blueprint $table) {
            $table  ->foreign('postulante','confirmacion_llegada_pre_uach_foreign')
                    ->references('postulante')
                    ->on('pre_uach')
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
        Schema::table('confirmacion_llegada', function(Blueprint $table) {
            $table->dropForeign('confirmacion_llegada_pre_uach_foreign');

        });
    }
}
