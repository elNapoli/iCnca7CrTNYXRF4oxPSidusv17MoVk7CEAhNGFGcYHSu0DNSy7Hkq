<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContactoExtranjeroFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacto_extranjero', function(Blueprint $table) {
            $table  ->foreign('postulante','contacto_extranjero_pre_uach_foreign')
                    ->references('postulante')
                    ->on('pre_uach')
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
        Schema::table('contacto_extranjero', function(Blueprint $table) {
            $table->dropForeign('contacto_extranjero_pre_uach_foreign');

        });
    }
}
