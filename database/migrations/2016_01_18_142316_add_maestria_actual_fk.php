<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMaestriaActualFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maestria_actual', function(Blueprint $table) {
            $table  ->foreign('postulante','maestria_actual_postgrado_foreign')
                    ->references('postulante')
                    ->on('postgrado')
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
        Schema::table('maestria_actual', function(Blueprint $table) {
            $table->dropForeign('maestria_actual_postgrado_foreign');

        });
    }
}
