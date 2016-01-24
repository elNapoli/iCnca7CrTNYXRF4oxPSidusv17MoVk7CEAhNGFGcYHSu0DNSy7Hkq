<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCindaFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cinda', function(Blueprint $table) {
            $table  ->foreign('postulante','cinda_pre_no_uach_foreign')
                    ->references('postulante')
                    ->on('pre_no_uach')
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
        Schema::table('cinda', function(Blueprint $table) {
            $table->dropForeign('cinda_pre_no_uach_foreign');

        });
    }
}
