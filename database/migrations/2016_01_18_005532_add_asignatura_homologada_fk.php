<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAsignaturaHomologadaFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('asignatura_homologada', function(Blueprint $table) {
            $table  ->foreign('homologacion','asignatura_homologada_homologacion_foreign')
                    ->references('id')
                    ->on('homologacion')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION');


            $table  ->foreign('asignatura','asignatura_homologada_asignatura_foreing')
                    ->references('codigo')
                    ->on('asignatura')
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
        Schema::table('asignatura_homologada', function(Blueprint $table) {
            $table->dropForeign('asignatura_homologada_homologacion_foreign');
            $table->dropForeign('asignatura_homologada_asignatura_foreing');
        });
    }
}
