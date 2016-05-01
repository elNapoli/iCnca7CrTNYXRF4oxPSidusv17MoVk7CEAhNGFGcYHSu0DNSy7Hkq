<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTestimonioFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testimonio', function(Blueprint $table) {
            $table  ->foreign('postulante','testimonio_postulante_foreign')
                    ->references('id')
                    ->on('postulante')
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
        Schema::table('testimonio', function(Blueprint $table) {
            $table->dropForeign('testimonio_postulante_foreign');

        });
    }
}
