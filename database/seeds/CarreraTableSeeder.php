<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Carrera;

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
       
        for($i = 0; $i <20; $i++)
        {
            $carrera = new Carrera();     	


            $carrera->facultad    			= $faker->numberBetween($min = 1, $max = 100);
            $carrera->nombre		 		= $faker->catchPhrase;
            $carrera->director				= $faker->firstName($gender = null|'male'|'female');
            $carrera->email 				= $faker->email;


            $carrera->save();

        }

    }
}