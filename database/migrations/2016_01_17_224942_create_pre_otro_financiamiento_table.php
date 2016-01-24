<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreOtroFinanciamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre_otro_financiamiento', function (Blueprint $table) {
            $table->string('descripcion',100);
            
            //foreingkey to pre_postulacion_universidad
            $table->integer('pre_postulacion_universidad')->unsigned();

            $table->primary('pre_postulacion_universidad');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pre_otro_financiamiento');
    }
}
