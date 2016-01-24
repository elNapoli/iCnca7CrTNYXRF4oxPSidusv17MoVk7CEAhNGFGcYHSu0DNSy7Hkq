<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAsignaturaFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asignatura', function(Blueprint $table) {
            $table  ->foreign('carrera','asignatura_carrera_foreign')
                    ->references('id')
                    ->on('carrera')
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
        Schema::table('asignatura', function(Blueprint $table) {
            $table->dropForeign('asignatura_carrera_foreign');
        });
    }
}
