<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\PreOtroFinanciamiento;
use App\PrePostulacionUniversidad;

class PreOtroFinanciamientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker     = Faker::create();
        $pUniversidad = PrePostulacionUniversidad::all();
        $samples_temp = [];

        foreach ($pUniversidad as $item)
        {

        	if($faker->numberBetween($min = 0, $max = 2) == 0 ){


	            $samples_temp[] = [
                    'pre_postulacion_universidad' => $item->id,
                    'descripcion'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true)
                ];
        	}
        	
        }
        PreOtroFinanciamiento::insert($samples_temp);


        
    }
}
