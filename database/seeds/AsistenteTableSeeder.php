<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\PreUach;
use App\Asistente;

class AsistenteTableSeeder extends Seeder
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

        	$numBeneficio = $faker->numberBetween($min = 1, $max = 5);

        	for($i = 0; $i < $numBeneficio; $i++){

        		$asistente = new Asistente();


    			$asistente->beneficio    = $faker->numberBetween($min = 1, $max = 20);
				$asistente->postulante   = $item->postulante;
				$asistente->nombre       = $faker->lastName.' '. $faker->firstName;
				$asistente->indicaciones = $faker->paragraph($nbSentences = 3, $variableNbSentences = true); 

				$asistente->save();

        	}
        }
    }
}
