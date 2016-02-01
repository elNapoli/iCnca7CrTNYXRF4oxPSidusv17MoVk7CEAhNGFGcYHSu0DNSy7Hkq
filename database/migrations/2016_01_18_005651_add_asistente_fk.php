<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAsistenteFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asistente', function(Blueprint $table) {
            $table  ->foreign('postulante','asistente_pre_uach_foreign')
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
        Schema::table('asistente', function(Blueprint $table) {
            $table->dropForeign('asistente_pre_uach_foreign');

        });
    }
}
