<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCiudadFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ciudad', function(Blueprint $table) {
            $table  ->foreign('pais','ciudad_pais_foreign')
                    ->references('id')
                    ->on('pais')
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
        Schema::table('ciudad', function(Blueprint $table) {
            $table->dropForeign('ciudad_pais_foreign');

        });
    }
}
