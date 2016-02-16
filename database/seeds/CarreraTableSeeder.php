<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Carrera;
use App\Facultad;

class CarreraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker::create();
       $facultad = Facultad::all();

      
        for($j= 1; $j< 500; $j++){
           # code...
            $numCarrera = $faker->numberBetween($min = 1, $max = 10);
            for($i = 0; $i <$numCarrera; $i++)
            {
                $carrera = new Carrera();       


                $carrera->facultad              = $j;
                $carrera->nombre                = $faker->catchPhrase;
                $carrera->director              = $faker->firstName($gender = null|'male'|'female');
                $carrera->email                 = $faker->unique->email;


                $carrera->save();

            }
       }

    }
}