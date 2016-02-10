<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\ConfirmacionLlegada;
use App\PreUach;
class ConfirmacionLlegadaTableSeeder extends Seeder
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
        	if($faker->numberBetween($min = 0, $max = 1) == 0){

	            $llegada                      = new ConfirmacionLlegada();
	            $fLlegada                     = $faker->dateTimeBetween($startDate = '-5 months', $endDate = 'now');
	            $fInicioCurso                 = $faker->dateTimeBetween($startDate = $fLlegada, $endDate = 'now');
	            $fTerminoCurso                = $faker->dateTimeBetween($startDate = $fInicioCurso, $endDate = 'now');



	            $llegada->postulante          = $item->postulante;
	            $llegada->fecha_llegada       = $fLlegada;
	            $llegada->fecha_inicio_curso  = $fInicioCurso;
	            $llegada->fecha_termino_curso = $fTerminoCurso;

				
	            $llegada->save();
        	}
        }

        
    }
}
