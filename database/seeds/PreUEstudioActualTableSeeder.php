<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\PreUEstudioActual;
use App\PreUach;
class PreUEstudioActualTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker           = Faker::create();
        $preUach         = PreUach::all();

        foreach ($preUach as $item)
        {

            $eActual               = new PreUEstudioActual();

            $eActual->postulante   = $item->postulante;
            $eActual->carrera      = $faker->numberBetween($min = 1, $max = 20);
            $eActual->anio_ingreso = $faker->year( $max = 'now'); 
            $eActual->ranking      = $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100);
            $eActual->beneficios   = $faker->sentence($nbWords = 8, $variableNbWords = true) ;

			
            $eActual->save();
            

        }
    }
}
