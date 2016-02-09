<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\AsignaturaHomologada;
use App\Homologacion;
use App\Asignatura;


class AsignaturaHomologadaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker        = Faker::create();
        $homologacion = Homologacion::all();
        $asignatura = Asignatura::all();
        $semestre     = array('semestre 1', 'semestre 2', 'ambos');


        foreach ($asignatura as $item){

            $asigCodigo[] = $item->codigo;
        }


        foreach ($homologacion as $item){

            for($i = 0; $i < 6; $i ++)
            {
         

                $asigHomologada = new AsignaturaHomologada();
        
                $asigHomologada->homologacion                  = $item->id;
                $asigHomologada->asignatura                    = $asigCodigo[$faker->unique->numberBetween($min = 0, $max = count($asigCodigo)-1)];
                $asigHomologada->codigo_asignatura_intercambio = $faker->bothify('???###');
                $asigHomologada->nombre_asignatura_intercambio = $faker->sentence($nbWords = 3, $variableNbWords = true);
                $asigHomologada->semestre                      = $semestre[$faker->numberBetween($min = 0, $max = 2)];

                $asigHomologada->save();

                
            
            }


     	 }
    }
}
