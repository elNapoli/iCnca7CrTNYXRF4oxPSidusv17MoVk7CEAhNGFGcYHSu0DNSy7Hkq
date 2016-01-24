<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Homologacion;
use App\PreUach;

class HomologacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $preUach = PreUach::all();
        foreach ($preUach as $item){

            $homologacion = new Homologacion();

            $homologacion->postulante = $item->postulante;
            $homologacion->pga        = $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100);
            $homologacion->motivo     = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
            $homologacion->fecha      = $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now');

            $homologacion->save();

        }

        foreach ($preUach as $item){
        	if($faker->numberBetween($min = 0, $max = 1) == 0){
	            $homologacionM = new Homologacion();

	            $homologacionM->postulante = $item->postulante;
	            $homologacionM->pga        = $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100);
	            $homologacionM->motivo     = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
	            $homologacionM->fecha      = $faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now');

	            $homologacionM->save();        		
        	}


        }

     	 
    }
}
