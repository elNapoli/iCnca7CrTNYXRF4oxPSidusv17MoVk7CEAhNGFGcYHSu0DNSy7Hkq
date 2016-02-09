<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\DetalleSolicitudCurso;
use App\PreNuSolicitudCurso;
use App\Asignatura;



class DetalleSolicitudCursoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker          = Faker::create();
        $solicitudCurso = PreNuSolicitudCurso::all();
        $asignatura     = Asignatura::all(); 
        $aceptado       = array('si','no');

		foreach ($asignatura as $item){

            $asigCodigo[] = $item->codigo;
        }
        foreach ($solicitudCurso as $item)
        {
        	for($i = 0; $i < $faker->numberBetween($min = 0, $max =6); $i ++){

	            $detalleCurso             = new DetalleSolicitudCurso();

	            $detalleCurso->solicitud_curso  = $item->id;
	            $detalleCurso->asignatura       = $asigCodigo[$faker->unique->numberBetween($min = 0, $max = count($asigCodigo)-1)];
	            $detalleCurso->observaciones    = $faker->paragraph($nbSentences = 5, $variableNbSentences = true);
	            $detalleCurso->aceptado         = $aceptado[$faker->numberBetween($min = 0, $max = 1)];

				
	            $detalleCurso->save();

        		
        	}
        	
        }

        
    }
}
