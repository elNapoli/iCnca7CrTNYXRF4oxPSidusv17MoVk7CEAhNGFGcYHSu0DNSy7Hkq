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

        for($i = 0; $i < 20; $i++)
        {
            $beneficio = new Beneficio();

            $beneficio->nombre    		= $faker->sentence($nbWords = 3, $variableNbWords = true);
            
            $beneficio->save();

        }





    }
}
