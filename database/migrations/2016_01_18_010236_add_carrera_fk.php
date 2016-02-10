<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCarreraFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carrera', function(Blueprint $table) {
            $table  ->foreign('facultad','carrera_facultad_foreign')
                    ->references('id')
                    ->on('facultad')
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
        Schema::table('carrera', function(Blueprint $table) {
            $table->dropForeign('carrera_facultad_foreign');

        });
    }
}
