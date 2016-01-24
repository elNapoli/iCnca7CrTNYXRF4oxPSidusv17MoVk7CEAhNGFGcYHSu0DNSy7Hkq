<?php

use Illuminate\Database\Seeder;
use App\PreNuEstudioActual;
use App\PreNoUach;
use Faker\Factory as Faker;


class PreNuEstudioActualTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker     = Faker::create();
        $preNoUach = PreNoUach::all();

        foreach ($preNoUach as $item)
        {


            $eActual                 = new PreNuEstudioActual();

            $eActual->postulante     = $item->postulante;
            $eActual->area           = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $eActual->anios_cursados = $faker->numberBetween($min = 0, $max = 7);
            $eActual->campus_sede    = $faker->numberBetween($min = 1, $max = 20);



            $eActual->save();
        	
        }

        
    }
}
