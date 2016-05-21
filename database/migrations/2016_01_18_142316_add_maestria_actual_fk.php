<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMaestriaActualFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maestria_actual', function(Blueprint $table) {
           $table  ->foreign('postulante','maestria_actual_postgrado_foreign')
                    ->references('postulante')
                    ->on('postgrado')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION');


                    // no pude agregar la fk a esta mierda de tabla
          /*  $table  ->foreign('campus_sede','maestria_actual_campus_sede_foreign')
                    ->references('campus_sede')
                    ->on('id')
                    ->onDelete('CASCADE')
                    ->onUpdate('NO ACTION');*/

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maestria_actual', function(Blueprint $table) {
            $table->dropForeign('maestria_actual_postgrado_foreign');
          //  $table->dropForeign('maestria_actual_campus_sede_foreign');

        });
    }
}
