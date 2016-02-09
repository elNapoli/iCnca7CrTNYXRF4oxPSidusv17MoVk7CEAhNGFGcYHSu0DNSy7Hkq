<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostOtroFinanciamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_otro_financiamiento', function (Blueprint $table) {
            $table->string('descripcion',100);

            //foreingkey to postgrado
            $table->integer('postulante')->unsigned();
            
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
        Schema::drop('post_otro_financiamiento');
    }
}
