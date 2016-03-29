<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlojamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alojamiento', function(Blueprint $table)
        {
            $table->increments('id');
            $table->enum('tipo', ['Casa', 'Cabaña','Departamento','Pension']);
            $table->string('direccion',100);
            $table->string('precio',100);
            $table->string('telefono',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('alojamiento');
    }
}
