<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Asignatura;
use App\Carrera;

class AsignaturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $carrara = Carrera::all();
        $samples_temp = [];

        
            for($j = 1; $j < 300; $j ++){
        for($i = 0; $i < 20; $i ++)
        {


                $samples_temp[] = [
                    'codigo' => $faker->bothify('??????######'),
                    'nombre'=> $faker->sentence($nbWords = 3, $variableNbWords = true),
                    'nivel'=>$faker->numberBetween($min = 1, $max = 12) ,
                    'anio'=>$faker->numberBetween($min = 1, $max = 6) ,
                    'carrera'=> $j
                ];

            }


     	 }

        Asignatura::insert($samples_temp);

    }
}
