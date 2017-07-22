<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConversationsFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public  function up()
    {
        Schema::table('conversations', function(Blueprint $table) {
            $table  ->foreign('topic_id','conversations_topic_foreign')
                    ->references('id')
                    ->on('topic')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION');
  
  
            $table  ->foreign('user_id','conversations_users_foreign')
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
        Schema::table('conversations', function(Blueprint $table){
		$table->dropForeign('conversations_topic_foreign');
		$table->dropForeign('conversations_users_foreign');
		});
    }
}
