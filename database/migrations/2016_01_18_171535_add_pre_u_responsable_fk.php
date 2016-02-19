<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPreUResponsableFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pre_u_responsable', function(Blueprint $table) {
            $table  ->foreign('postulante','pre_u_responsable_pre_uach_foreign')
                    ->references('postulante')
                    ->on('pre_uach')
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
        Schema::table('pre_u_responsable', function(Blueprint $table) {
            $table->dropForeign('pre_u_responsable_pre_uach_foreign');
            
        });
    }
}
