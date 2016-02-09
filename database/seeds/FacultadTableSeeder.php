<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Facultad;

class FacultadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 100; $i++)
        {
            $facultad = new Facultad();

            $facultad->campus_sede	= $faker->numberBetween($min = 1, $max = 20);
            $facultad->nombre     	= $faker->name . ' University';
            $facultad->telefono		= $faker->phoneNumber;

            $facultad->save();

        }

    }
}
