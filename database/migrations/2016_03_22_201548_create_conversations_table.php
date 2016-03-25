<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	    // Create conversations table.

        Schema::create('conversations', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('title');
            $table->text('message');

            $table->integer('topic_id')->unsigned();
            $table->foreign('topic_id')
                ->references('id')->on('topic')->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');

            $table->string('slug');

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
	    // Delete conversations table.

		Schema::drop('conversations');
	}

}
