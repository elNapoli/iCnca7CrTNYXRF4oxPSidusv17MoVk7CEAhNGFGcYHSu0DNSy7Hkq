<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPreNoUachFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pre_no_uach', function(Blueprint $table) {
            $table  ->foreign('postulante','pre_no_uach_pregrado_foreign')
                    ->references('postulante')
                    ->on('pregrado')
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
        Schema::table('pre_no_uach', function(Blueprint $table) {
            $table->dropForeign('pre_no_uach_pregrado_foreign');
        });
    }
}
