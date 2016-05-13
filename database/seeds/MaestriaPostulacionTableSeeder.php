<?php

use Illuminate\Database\Seeder;
use App\MaestriaPostulacion;
use App\Postgrado;
use Faker\Factory as Faker;
class MaestriaPostulacionTableSeeder extends Seeder
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
                ];

            }
            
		}
        MaestriaPostulacion::insert($samples_temp);


    }
}
