<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCindaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinda', function (Blueprint $table) {
            //Foreign Key to PRE_NO_UACH
            $table->integer('postulante')->unsigned();

            $table->string('codigo_universidad',15);
            $table->string('nombre_responsable_academico',45);
            $table->string('telefono_responsable_academico',20);
            $table->string('email_responsable_academico',45);

            //Primary Key
            $table->primary('postulante');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cinda');
    }
}
