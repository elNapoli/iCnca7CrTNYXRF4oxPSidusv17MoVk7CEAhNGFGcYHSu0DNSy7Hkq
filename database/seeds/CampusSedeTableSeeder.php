<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\CampusSede;

class CampusSedeTableSeeder extends Seeder
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
            $CampusSede = new CampusSede();

            $CampusSede->nombre    		= $faker->firstName($gender = null|'male'|'female');
            $CampusSede->telefono   	= $faker->phoneNumber;
            $CampusSede->fax 			= $faker->phoneNumber;
            $CampusSede->sitio_web		= $faker->url;
            $CampusSede->universidad	= $faker->numberBetween($min = 1, $max = 20);
            $CampusSede->ciudad			= $faker->numberBetween($min = 1, $max = 500);
            
            $CampusSede->save();

        }





    }
}
