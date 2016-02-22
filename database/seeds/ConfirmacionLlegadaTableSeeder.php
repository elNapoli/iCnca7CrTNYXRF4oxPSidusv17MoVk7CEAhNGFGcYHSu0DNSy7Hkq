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
        $samples_temp = [];

        foreach ($preUach as $item)
        {
        	if($faker->numberBetween($min = 0, $max = 1) == 0){

	            $llegada                      = new ConfirmacionLlegada();
	            $fLlegada                     = $faker->dateTimeBetween($startDate = '-5 months', $endDate = 'now');
	            $fInicioCurso                 = $faker->dateTimeBetween($startDate = $fLlegada, $endDate = 'now');
	            $fTerminoCurso                = $faker->dateTimeBetween($startDate = $fInicioCurso, $endDate = 'now');

                $samples_temp[] = [
                    'postulante' =>$item->postulante,
                    'fecha_llegada'=>$fLlegada,
                    'fecha_inicio_curso'=>$fInicioCurso ,
                    'fecha_termino_curso'=>$fTerminoCurso
                ];
        	}
        }
        ConfirmacionLlegada::insert($samples_temp);


        
    }
}
