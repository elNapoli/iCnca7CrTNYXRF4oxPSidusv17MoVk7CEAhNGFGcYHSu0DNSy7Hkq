<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPregradoFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pregrado', function(Blueprint $table) {
            $table  ->foreign('postulante','pregrado_postulante_foreign')
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
        Schema::table('pregrado', function(Blueprint $table) {
            $table->dropForeign('pregrado_postulante_foreign');
        });
    }
}
