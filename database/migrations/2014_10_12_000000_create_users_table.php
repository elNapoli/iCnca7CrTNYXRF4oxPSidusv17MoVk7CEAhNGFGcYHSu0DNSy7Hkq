<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('apellido_paterno');
			$table->enum('confirmado',[0,1,2,3]);
			//donde 0 es no confirmado 1 es confirmado 2 es acceso negado y 3 es acceso restituido
			$table->string('codigo_confirmacion',30)->nullable();
			$table->enum('tipo_usuario',['usuario','administrador'])->default('usuario');
			$table->string('email',50)->unique();
			$table->string('password', 60);
			$table->string('avatar',255);
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
