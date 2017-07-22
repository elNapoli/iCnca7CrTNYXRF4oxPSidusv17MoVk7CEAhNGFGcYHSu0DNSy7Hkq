<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRepliesFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::table('replies', function(Blueprint $table) {
            $table  ->foreign('conversation_id','replies_conversations_foreign')
                    ->references('id')
                    ->on('conversations')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION');

            $table  ->foreign('user_id','replies_users_foreign')
                    ->references('id')
                    ->on('users')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION');

        });
    }
   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('replies', function(Blueprint $table) {
		$table->dropForeign('replies_conversations_foreign');
		$table->dropForeign('replies_users_foreign');
		});
    }
}
