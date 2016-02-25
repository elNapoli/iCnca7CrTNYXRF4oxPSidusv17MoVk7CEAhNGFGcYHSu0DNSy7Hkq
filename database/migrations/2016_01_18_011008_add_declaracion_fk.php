<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeclaracionFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('declaracion', function(Blueprint $table) {
            $table  ->foreign('postulante','declaracion_pre_uach_foreign')
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
        Schema::table('declaracion', function(Blueprint $table) {
            $table->dropForeign('declaracion_pre_uach_foreign');

        });
    }
}
