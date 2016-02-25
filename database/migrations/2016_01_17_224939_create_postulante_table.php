<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulante', function (Blueprint $table) {
            $table->increments('id');
            $table->string('apellido_paterno', 45);
            $table->string('apellido_materno', 45);
            $table->string('nombre', 45);
            $table->enum('sexo', ['f', 'm']);
            $table->string('nacionalidad', 45);
            $table->date('fecha_nacimiento');
            $table->string('lugar_nacimiento', 45);
            $table->string('telefono',20);
            $table->string('email_personal', 45)->unique();
            $table->string('tipo_estudio',9);
            $table->string('direccion',45);

            //foreignkey to ciudad
            $table->integer('ciudad')->unsigned();;
            $table->integer('user_id')->unsigned();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('postulante');
    }
}
