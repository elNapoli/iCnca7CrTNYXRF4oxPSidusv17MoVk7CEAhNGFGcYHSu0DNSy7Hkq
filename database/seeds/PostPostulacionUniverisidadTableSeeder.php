<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Postgrado;
use App\PostPostulacionUniversidad;



class PostPostulacionUniverisidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $postgrado = Postgrado::all();

        $tipos = array('Diploma de Postgrado','Experto Universitario','Especialista Universitario', 'Magíster','Doctorado');
        $semestre = array('semestre_1', 'semestre_2', 'semestre_3','semestre_4','otro'); 
        
        $samples_temp = [];

        foreach ($postgrado as $item)
        {
            $desde                        = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now');
            $semestre_temp = $semestre[$faker->numberBetween($min = 0, $max = count($semestre)-1)];
            if($semestre_temp === 'otro'){
                 $samples_temp[] = [
                    'postulante' => $item->postulante,
                    'tipo'=> $faker->numberBetween($min = 0, $max = count($tipos)-1),
                    'anio'=> $faker->numberBetween($min = 1990, $max = 2016) ,
                    'duracion'=> $semestre_temp,
                    'desde'=>$desde ,
                    'hasta'=>$faker->dateTimeBetween($startDate = $desde, $endDate = 'now'),
                    'nombre_maestria'=> $faker->sentence($nbWords = 6, $asText = false),
                    'laboratorio'=>$faker->sentence($nbWords = 6, $asText = false),
                    'contacto_uach'=>$faker->lastName.' '.$faker->firstName ,
                    'area'=>$faker->sentence($nbWords = 6, $asText = false),
                    'instituto'=> $faker->sentence($nbWords = 6, $asText = false),
                    'facultad'=> $faker->numberBetween($min = 1, $max = 100),
                    'financiamiento'=> $faker->numberBetween($min = 1, $max = 3),
                    'celular'=>$faker->phoneNumber
                ];

            }
            else{
                $samples_temp[] = [
                    'postulante' => $item->postulante,
                    'tipo'=> $faker->numberBetween($min = 0, $max = count($tipos)-1),
                    'anio'=> $faker->numberBetween($min = 1990, $max = 2016) ,
                    'duracion'=> $semestre_temp,
                    'desde'=>'' ,
                    'hasta'=>'',
                    'area'=>$faker->sentence($nbWords = 6, $asText = false),
                    'nombre_maestria'=> $faker->sentence($nbWords = 6, $asText = false),
                    'laboratorio'=>$faker->sentence($nbWords = 6, $asText = false),
                    'contacto_uach'=>$faker->lastName.' '.$faker->firstName ,
                    'instituto'=> $faker->sentence($nbWords = 6, $asText = false),
                    'financiamiento'=> $faker->numberBetween($min = 1, $max = 3),
                    'facultad'=> $faker->numberBetween($min = 1, $max = 100),
                    'celular'=>$faker->phoneNumber
                ];

            }
            
        }
        PostPostulacionUniversidad::insert($samples_temp);


    }
}
