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

        foreach ($preNoUach as $item)
        {
        	if($faker->numberBetween($min = 0, $max = 2) == 0){

            $cinda             = new Cinda();

            $cinda->postulante                     = $item->postulante;
            $cinda->codigo_universidad             = $faker->bothify('???###');
            $cinda->nombre_responsable_academico   = $faker->lastName.' '.$faker->firstName;
            $cinda->telefono_responsable_academico = $faker->phoneNumber;
            $cinda->email_responsable_academico    = $faker->email;

			
            $cinda->save();
        	}
        }

        
    }
}

