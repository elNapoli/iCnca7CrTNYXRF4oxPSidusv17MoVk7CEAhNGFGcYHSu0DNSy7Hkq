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
        $samples_temp = [];

        foreach ($CampusSede as $item) {
            $numFacultad = $faker->numberBetween($min = 3, $max = 10);

            # code...
            for($i = 0; $i < $numFacultad; $i++)
            {
                $samples_temp[] = [
                    'campus_sede' => $item->id,
                    'nombre'=>  $faker->name . ' University',
                    'telefono'=>$faker->phoneNumber
                ];  

            }
        }
        Facultad::insert($samples_temp);


    }
}
