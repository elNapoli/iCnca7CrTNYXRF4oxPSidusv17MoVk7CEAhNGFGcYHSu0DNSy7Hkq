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
        foreach ($mPostulacion as $item)
        {
            if($faker->numberBetween($min = 0, $max = 1) == 0){

                $oMaestria                = new OtraMaestria();

                $oMaestria->postulante    = $item->postulante;
                $oMaestria->nombre        = $faker->sentence($nbWords = 6, $asText = false);   
                $oMaestria->laboratorio   = $faker->sentence($nbWords = 6, $asText = false); 
                $oMaestria->contacto_uach = $faker->lastName.' '.$faker->firstName;
                $oMaestria->instituto     = $faker->sentence($nbWords = 6, $asText = false); 
                $oMaestria->facultad      = $faker->numberBetween($min = 1, $max = 100);

                $oMaestria->save();
            }

        }


    }
}
