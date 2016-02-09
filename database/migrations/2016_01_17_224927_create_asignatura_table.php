<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsignaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignatura', function (Blueprint $table) {
            $table->string('codigo',10);
            $table->integer('nivel');
            $table->string('nombre',45);
            $table->string('anio',45);

            //Foreign Key to CARRERA
            $table->integer('carrera')->unsigned();

            $table->primary('codigo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('asignatura');
    }
}
