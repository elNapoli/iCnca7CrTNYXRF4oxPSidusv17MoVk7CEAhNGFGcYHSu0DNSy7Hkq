<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDepartamentoFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('departamento', function(Blueprint $table) {
            $table  ->foreign('campus_sede','departamento_campus_sede_foreign')
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
        Schema::table('departamento', function(Blueprint $table) {
            $table->dropForeign('departamento_campus_sede_foreign');

        });
    }
}
