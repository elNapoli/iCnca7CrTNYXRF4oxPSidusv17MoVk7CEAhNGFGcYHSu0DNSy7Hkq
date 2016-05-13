<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificaciones', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('destino_id')->unsigned();
            $table->integer('objetivo_id')->unsigned();
            $table->string('tipo',100);
            $table->boolean('vista')->default('0');
            $table->timestamp('fecha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('notificaciones');

    }
}
