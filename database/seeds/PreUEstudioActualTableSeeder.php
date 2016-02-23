<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\PreUEstudioActual;
use App\PreUach;
class PreUEstudioActualTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker           = Faker::create();
        $preUach         = PreUach::all();
        $samples_temp = [];

        foreach ($preUach as $item)
        {

            $samples_temp[] = [
                'postulante' => $item->postulante,
                'carrera'=>$faker->numberBetween($min = 1, $max = 20),
                'anio_ingreso'=>$faker->year( $max = 'now'),
                'ranking'=>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100) ,
                'beneficios'=>  $faker->sentence($nbWords = 8, $variableNbWords = true)
            ];           

        }
        PreUEstudioActual::insert($samples_temp);

    }
}
