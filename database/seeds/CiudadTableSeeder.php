<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Ciudad;


class CiudadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $ciudad = new Ciudad();

        $ciudad->nombre        = 'Valdivia';
        $ciudad->pais          = '1';
        $ciudad->codigo_postal = $faker->postcode;
        $ciudad->save();

        $ciudad = new Ciudad();
        $ciudad->nombre        = 'Puerto Montt';
        $ciudad->pais          = '1';
        $ciudad->codigo_postal = $faker->postcode;
        $ciudad->save();
        
        for($i = 0; $i < 500; $i++)
        {
            $ciudad = new Ciudad();

            $ciudad->nombre        = $faker->city;
            $ciudad->pais          = $faker->numberBetween($min = 1, $max = 200);
            $ciudad->codigo_postal = $faker->postcode;
            
            $ciudad->save();

        }





    }
}
