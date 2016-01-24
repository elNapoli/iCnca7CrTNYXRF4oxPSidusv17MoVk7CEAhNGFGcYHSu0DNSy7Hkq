<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacultadFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facultad', function(Blueprint $table) {
            $table  ->foreign('campus_sede','facultad_campus_sede_foreign')
                    ->references('id')
                    ->on('campus_sede')
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
        Schema::table('facultad', function(Blueprint $table) {
            $table->dropForeign('facultad_campus_sede_foreign');

        });
    }
}
