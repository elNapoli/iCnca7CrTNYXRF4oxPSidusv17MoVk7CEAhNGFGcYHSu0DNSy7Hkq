<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaisFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pais', function(Blueprint $table) {
            $table  ->foreign('continente','pais_continente_foreign')
                    ->references('id')
                    ->on('continente')
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
        Schema::table('pais', function(Blueprint $table) {
            $table->dropForeign('pais_continente_foreign');
        });
    }
}
