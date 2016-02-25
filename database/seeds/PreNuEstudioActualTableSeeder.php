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
        $samples_temp = [];

        foreach ($preNoUach as $item)
        {


            $samples_temp[] = [
                'postulante' => $item->postulante,
                'area'=> $faker->sentence($nbWords = 6, $variableNbWords = true),
                'anios_cursados'=>$faker->numberBetween($min = 0, $max = 7) ,
                'campus_sede'=>$faker->numberBetween($min = 1, $max = 100)
            ];



        	
        }
        PreNuEstudioActual::insert($samples_temp);

        
    }
}
