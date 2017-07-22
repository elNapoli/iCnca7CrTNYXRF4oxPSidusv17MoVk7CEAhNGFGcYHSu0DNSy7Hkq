<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLikesFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::table('likes', function(Blueprint $table) {
            $table  ->foreign('user_id','likes_users_foreign')
                    ->references('id')
                    ->on('users')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION');

            $table  ->foreign('reply_id','likes_replies_foreign')
                    ->references('id')
                    ->on('replies')
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
        Schema::table('detalle_beneficio', function(Blueprint $table) {
            $table->dropForeign('likes_users_foreign');
            $table->dropForeign('likes_replies_foreign');

        });
    }
}

