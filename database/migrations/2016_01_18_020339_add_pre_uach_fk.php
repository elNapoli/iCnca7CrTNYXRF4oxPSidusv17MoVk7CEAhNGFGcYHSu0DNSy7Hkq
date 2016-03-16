<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPreUachFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pre_uach', function(Blueprint $table) {
            $table  ->foreign('postulante','pre_uach_pregrado_foreign')
                    ->references('postulante')
                    ->on('pregrado')
                    ->onDelete('CASCADE')
                    ->onUpdate('no action');

             $table  ->foreign('ciudad','pre_uach_ciudad_foreign')
                    ->references('id')
                    ->on('ciudad')
                    ->onDelete('NO ACTION')
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
        Schema::table('pre_uach', function(Blueprint $table) {
            $table->dropForeign('pre_uach_pregrado_foreign');
            $table->dropForeign('pre_uach_ciudad_foreign');
            
        });
    }
}
