<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Declaracion;
use App\PreUach;

class DeclaracionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker     = Faker::create();
        $preUach = PreUach::all();
        $samples_temp = [];

        foreach ($preUach as $item)
        {


            $samples_temp[] = [
                'postulante' => $item->postulante,
                'persona_matricula'=>  $faker->lastName.' '. $faker->firstName,
                'fecha_matricula'=>$faker->dateTimeBetween($startDate = '-5 months', $endDate = 'now')
            ];        	
        }

        Declaracion::insert($samples_temp);
        
    }
}
