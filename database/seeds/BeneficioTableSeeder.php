<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Beneficio;

class BeneficioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
        $samples_temp = [];

        for($i = 0; $i < 20; $i++)
        {   
            $samples_temp[] = [
                'nombre' => $faker->sentence($nbWords = 3, $variableNbWords = true)
            ];


        }

         Beneficio::insert($samples_temp);




    }
}
