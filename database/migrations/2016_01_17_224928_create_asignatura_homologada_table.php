<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturaHomologadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignatura_homologada', function (Blueprint $table) {
            //Foreign Key to HOMOLOGACION
            $table->integer('homologacion')->unsigned();

            //Foreign Key to ASIGNATURA
            $table->string('asignatura',10)->index();

            $table->string('codigo_asignatura_intercambio',10);
            $table->string('nombre_asignatura_intercambio',45);
            $table->enum('semestre',['semestre 1','semestre 2','ambos']);

            $table->primary(['homologacion','asignatura']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asignatura_homologada');
    }
}
