<?php

use Illuminate\Database\Seeder;
use App\OtraMaestria;
use App\MaestriaPostulacion;
use Faker\Factory as Faker;

class OtraMaestriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $mPostulacion = MaestriaPostulacion::all();
        $samples_temp = [];
        foreach ($mPostulacion as $item)
        {
            if($faker->numberBetween($min = 0, $max = 1) == 0){
                 $samples_temp[] = [
                    'postulante' => $item->postulante,
                    'nombre'=> $faker->sentence($nbWords = 6, $asText = false),
                    'laboratorio'=>$faker->sentence($nbWords = 6, $asText = false),
                    'contacto_uach'=>$faker->lastName.' '.$faker->firstName ,
                    'instituto'=> $faker->sentence($nbWords = 6, $asText = false),
                    'facultad'=> $faker->numberBetween($min = 1, $max = 100)
                ];
         
            }

        }
         OtraMaestria::insert($samples_temp);



    }

}
