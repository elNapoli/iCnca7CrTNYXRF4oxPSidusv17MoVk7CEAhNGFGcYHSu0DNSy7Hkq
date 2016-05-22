<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvenioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',250);
            $table->string('vigencia',100);
            $table->date('firmado');
            $table->date('vencimiento');
            $table->string('areas_cubre',45);
            $table->string('observaciones',100);
            $table->enum('bilateral',['SI','NO'])->default('NO');

            //Foreign Key to UNIVERSIDAD
            $table->unsignedInteger('UNIVERSIDAD')->index();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('convenio');
    }
}
