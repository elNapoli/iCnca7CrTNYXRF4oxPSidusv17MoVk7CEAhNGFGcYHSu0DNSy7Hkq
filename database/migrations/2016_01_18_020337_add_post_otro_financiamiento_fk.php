<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostOtroFinanciamientoFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_otro_financiamiento', function(Blueprint $table) {
            $table  ->foreign('postulante','post_otro_financiamiento_postgrado_foreign')
                    ->references('postulante')
                    ->on('postgrado')
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
        Schema::table('post_otro_financiamiento', function(Blueprint $table) {
            $table->dropForeign('post_otro_financiamiento_postgrado_foreign');
        });
    }
}
