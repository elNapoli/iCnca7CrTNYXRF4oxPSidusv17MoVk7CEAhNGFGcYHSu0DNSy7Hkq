<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConvenioFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('convenio', function(Blueprint $table) {
            $table  ->foreign('universidad','convenio_universidad_foreign')
                    ->references('id')
                    ->on('universidad')
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
        Schema::table('convenio', function(Blueprint $table) {
            $table->dropForeign('convenio_universidad_foreign');

        });
    }
}
