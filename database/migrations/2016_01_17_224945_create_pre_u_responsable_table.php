<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreUResponsableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_u_responsable', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipo', 45);
            $table->integer('postulante')->unsigned();
            $table->string('nombre',45);
            $table->string('telefono_1',20);
            $table->string('telefono_2',20);
            $table->string('parentesco',45);
            $table->string('email',45);
            $table->string('direccion',45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pre_u_responsable');
    }
}
