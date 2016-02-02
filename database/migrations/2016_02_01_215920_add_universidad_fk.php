<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniversidadFk extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('universidad', function(Blueprint $table) {
            $table  ->foreign('pais','universidad_pais_foreign')
                    ->references('id')
                    ->on('pais')
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
        Schema::table('universidad', function(Blueprint $table) {
            $table->dropForeign('universidad_pais_foreign');

        });
	}

}
