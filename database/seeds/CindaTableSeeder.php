<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Cinda;
use App\PreNoUach;


class CindaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker     = Faker::create();
        $preNoUach = PreNoUach::all();
        $samples_temp = [];

        foreach ($preNoUach as $item)
        {
        	if($faker->numberBetween($min = 0, $max = 2) == 0){

    	        $samples_temp[] = [
                    'postulante' => $item->postulante,
                    'codigo_universidad'=> $faker->bothify('???###'),
                    'nombre_responsable_academico'=>$faker->lastName.' '.$faker->firstName,
                    'telefono_responsable_academico'=>$faker->phoneNumber,
                    'email_responsable_academico'=> $faker->email

                ];

        	}
        }

         Cinda::insert($samples_temp);
        
    }
}

