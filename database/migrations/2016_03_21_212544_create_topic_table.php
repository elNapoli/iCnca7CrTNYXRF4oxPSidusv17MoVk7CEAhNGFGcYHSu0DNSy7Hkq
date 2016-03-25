<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic', function (Blueprint $table) {
            $table->increments('id');

            //foreign key to campus_sede
            
            $table->string('nombre',45);
            $table->string('color', 8);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('topic');
        
    }
}
