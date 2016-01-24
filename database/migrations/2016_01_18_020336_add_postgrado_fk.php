<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostgradoFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postgrado', function(Blueprint $table) {
            $table  ->foreign('postulante','postgrado_postulante_foreign')
                    ->references('id')
                    ->on('postulante')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION');

            $table  ->foreign('financiamiento','postgrado_financiamiento_foreign')
                    ->references('id')
                    ->on('financiamiento')
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
        Schema::table('postgrado', function(Blueprint $table) {
            $table->dropForeign('postgrado_postulante_foreign');
            $table->dropForeign('postgrado_financiamiento_foreign');
        });
    }
}
