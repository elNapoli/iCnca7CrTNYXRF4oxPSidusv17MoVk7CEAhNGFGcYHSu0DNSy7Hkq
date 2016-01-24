<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomologacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homologacion', function (Blueprint $table) {
            $table->increments('id');
            $table->double('pga');
            $table->string('motivo',45);
            $table->date('fecha');

            //foreign key to pre_uach
            $table->integer('postulante')->unsigned();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('homologacion');
    }
}
