<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPreOtroFinanciamientoFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pre_otro_financiamiento', function(Blueprint $table) {
            $table  ->foreign('pre_postulacion_universidad','pre_otro_financiamiento_pre_postulacion_universidad_foreign')
                    ->references('id')
                    ->on('pre_postulacion_universidad')
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
        Schema::table('pre_otro_financiamiento', function(Blueprint $table) {
            $table->dropForeign('pre_otro_financiamiento_pre_postulacion_universidad_foreign');
            
        });
    }
}
