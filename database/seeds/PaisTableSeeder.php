<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Pais;

class PaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();

        $pais = new Pais();

        $pais->nombre     = 'Chile';
        $pais->continente = 2;

        $pais->save();
        $samples_temp = [];

        for($i = 0; $i < 200; $i++)
        {  
            $samples_temp[] = [
                'nombre' => $faker->country,
                'continente'=> $faker->numberBetween($min = 1, $max = 6)
            ];

        }
         Pais::insert($samples_temp);

    }
}
