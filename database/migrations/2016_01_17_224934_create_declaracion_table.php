<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeclaracionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('declaracion', function (Blueprint $table) {
            $table->integer('postulante')->unsigned();
            
            $table->string('persona_matricula',45);
            $table->primary('postulante');
            $table->date('fecha_matricula');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('declaracion');
    }
}
