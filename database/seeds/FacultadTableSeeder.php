<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Facultad;
use App\CampusSede;


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
        $CampusSede =  CampusSede::all();

        foreach ($CampusSede as $item) {
            $numFacultad = $faker->numberBetween($min = 3, $max = 10);

            # code...
            for($i = 0; $i < $numFacultad; $i++)
            {
                $facultad = new Facultad();

                $facultad->campus_sede  = $item->id;
                $facultad->nombre       = $faker->name . ' University';
                $facultad->telefono     = $faker->phoneNumber;

                $facultad->save();

            }
        }

    }
}
