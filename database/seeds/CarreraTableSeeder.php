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

        $samples_temp = [];
      
        foreach ($facultad as $item) {
            # code...
            $numCarrera = $faker->numberBetween($min = 1, $max = 10);
            for($i = 0; $i <$numCarrera; $i++)
            {

                $samples_temp[] = [
                    'facultad' => $item->id,
                    'nombre'=> $faker->catchPhrase,
                    'director'=>$faker->firstName.' '.$faker->lastName ,
                    'email'=>$faker->unique->email
                ];
            }


        }
        Carrera::insert($samples_temp);


    }
}