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
        $samples_temp = [];

		foreach ($asignatura as $item){

            $asigCodigo[] = $item->codigo;
        }
        foreach ($solicitudCurso as $item)
        {
        	for($i = 0; $i < $faker->numberBetween($min = 0, $max =6); $i ++){

                $samples_temp[] = [
                    'solicitud_curso' => $item->id,
                    'asignatura'=> $asigCodigo[$faker->unique->numberBetween($min = 0, $max = count($asigCodigo)-1)],
                    'observaciones'=>$faker->paragraph($nbSentences = 5, $variableNbSentences = true) ,
                    'aceptado'=>$aceptado[$faker->numberBetween($min = 0, $max = 1)]
                ];
        		
        	}
        	
        }
        DetalleSolicitudCurso::insert($samples_temp);

        
    }
}
