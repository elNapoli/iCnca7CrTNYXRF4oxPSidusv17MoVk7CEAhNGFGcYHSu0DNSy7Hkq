<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\PrePostulacionUniversidad;
use App\Pregrado;

class PrePostulacionUniversidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker    = Faker::create();
        $pregrado = Pregrado::all();
        $semestre = array('semestre 1', 'semestre 2', 'ambos'); 
        foreach ($pregrado as $item)
        {


            $pUniversidad                 = new PrePostulacionUniversidad();
            $desde                        = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now');
	      

            $pUniversidad->postulante     = $item->postulante;
            $pUniversidad->anio           = $faker->year($max = 'now'); 
            $pUniversidad->semestre       =	$semestre[$faker->numberBetween($min = 0, $max = 2)];
            $pUniversidad->desde          = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now');
            $pUniversidad->hasta          = $faker->dateTimeBetween($startDate = $desde, $endDate = 'now');
            $pUniversidad->financiamiento = $faker->numberBetween($min = 1, $max = 3);
            $pUniversidad->carrera        = $faker->numberBetween($min = 1, $max = 20);


            $pUniversidad->save();
        	
        }

        
    }
}
