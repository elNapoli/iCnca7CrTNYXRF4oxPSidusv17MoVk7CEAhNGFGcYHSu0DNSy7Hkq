<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\CampusSede;
use App\Universidad;

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
        $universidad = Universidad::all();

        foreach ($universidad as $item){

            $numBeneficio = $faker->numberBetween($min = 1, $max = 5);
            for($i = 0; $i < $numBeneficio; $i++)
            {
                $CampusSede = new CampusSede();

                $CampusSede->nombre    		= $faker->firstName($gender = null|'male'|'female');
                $CampusSede->telefono   	= $faker->phoneNumber;
                $CampusSede->fax 			= $faker->phoneNumber;
                $CampusSede->sitio_web		= $faker->url;
                $CampusSede->universidad	= $item->id;
                $CampusSede->ciudad			= $faker->numberBetween($min = 1, $max = 500);
                
                $CampusSede->save();

            }
        }





    }
}
