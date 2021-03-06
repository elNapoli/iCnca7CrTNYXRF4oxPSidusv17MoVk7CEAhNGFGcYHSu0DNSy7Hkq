<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDetalleBeneficioFk extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::table('detalle_beneficio', function(Blueprint $table) {
            $table  ->foreign('id_a','detalle_beneficio_asistente_foreign')
                    ->references('id')
                    ->on('asistente')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION');

            $table  ->foreign('beneficio','detalle_beneficio_beneficio_foreign')
                    ->references('id')
                    ->on('beneficio')
                    ->onDelete('NO ACTION')
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
        Schema::table('detalle_beneficio', function(Blueprint $table) {
            $table->dropForeign('detalle_beneficio_asistente_foreign');
            $table->dropForeign('detalle_beneficio_beneficio_foreign');

        });
    }
}
