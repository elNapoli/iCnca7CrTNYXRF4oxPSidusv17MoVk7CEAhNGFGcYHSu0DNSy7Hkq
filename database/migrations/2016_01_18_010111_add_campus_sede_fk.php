<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampusSedeFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::table('campus_sede', function(Blueprint $table) {
            $table  ->foreign('universidad','campus_sede_universidad_foreign')
                    ->references('id')
                    ->on('universidad')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION');

            $table  ->foreign('ciudad','campus_sede_ciudad_foreign')
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
        Schema::table('campus_sede', function(Blueprint $table) {
            $table->dropForeign('campus_sede_universidad_foreign');
            $table->dropForeign('campus_sede_ciudad_foreign');

        });
    }
}
