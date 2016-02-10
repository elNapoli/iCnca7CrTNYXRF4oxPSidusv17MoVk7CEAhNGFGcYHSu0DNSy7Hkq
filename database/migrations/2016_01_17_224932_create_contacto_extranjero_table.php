<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactoExtranjeroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacto_extranjero', function (Blueprint $table) {
            //Foreign Key to PRE_UACH
            $table->integer('postulante')->unsigned();

            $table->string('conocido_extranjero',300);
            $table->string('direccion',45);
            $table->string('telefono_1',20);
            $table->string('telefono_2',20);
            $table->string('nombre_seguro',45);
            $table->date('validez_seguro');
            $table->string('numero_seguro',45);
            $table->string('nombre_hospital',45);
            $table->string('direccion_hospital',45);

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
        Schema::drop('contacto_extranjero');
    }
}
