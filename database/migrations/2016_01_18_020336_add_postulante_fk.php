<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostulanteFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postulante', function(Blueprint $table) {
            $table  ->foreign('ciudad','postulante_ciudad_foreign')
                    ->references('id')
                    ->on('ciudad')
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
        Schema::table('postulante', function(Blueprint $table) {
            $table->dropForeign('postulante_ciudad_foreign');
        });
    }
}
