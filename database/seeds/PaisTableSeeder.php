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

        for($i = 0; $i < 200; $i++)
        {
            $pais = new Pais();

            $pais->nombre     = $faker->country;
            $pais->continente = $faker->numberBetween($min = 1, $max = 6);

            $pais->save();

        }

    }
}
