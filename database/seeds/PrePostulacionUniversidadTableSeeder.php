<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\PrePostulacionUniversidad;
use App\Pregrado;

class PrePostulacionUniversidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker    = Faker::create();
        $pregrado = Pregrado::all();
        $semestre = array('semestre 1', 'semestre 2', 'ambos','otro'); 
        $samples_temp = [];

        foreach ($pregrado as $item)
        {


            $desde                        = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now');
            $semestre_temp = $semestre[$faker->numberBetween($min = 0, $max = count($semestre)-1)];
            if($semestre_temp === 'otro'){
                $samples_temp[] = [
                    'postulante' =>  $item->postulante,
                    'anio'=> $faker->year($max = 'now'),
                    'semestre'=> $semestre_temp,
                    'desde'=>$desde ,
                    'hasta'=>$faker->dateTimeBetween($startDate = $desde, $endDate = 'now'),
                    'financiamiento'=> $faker->numberBetween($min = 1, $max = 3),
                    'carrera'=> $faker->numberBetween($min = 1, $max = 500)
                ];
            }
            else{

                $samples_temp[] = [
                    'postulante' =>  $item->postulante,
                    'anio'=> $faker->year($max = 'now'),
                    'semestre'=> $semestre_temp,
                    'desde'=>'' ,
                    'hasta'=>'',
                    'financiamiento'=> $faker->numberBetween($min = 1, $max = 3),
                    'carrera'=> $faker->numberBetween($min = 1, $max = 500)
                ];
            }
            

            
        }
        PrePostulacionUniversidad::insert($samples_temp);

        
    }
}
