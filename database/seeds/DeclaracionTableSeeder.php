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

        foreach ($preUach as $item)
        {


            $declaracion = new Declaracion();

            $declaracion->postulante        = $item->postulante;
            $declaracion->persona_matricula = $faker->lastName.' '. $faker->firstName;
            $declaracion->fecha_matricula   = $faker->dateTimeBetween($startDate = '-5 months', $endDate = 'now');

            $declaracion->save();
        	
        }

        
    }
}
