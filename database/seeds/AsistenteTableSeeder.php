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

        		$asistente = new Asistente();

				$asistente->postulante   = $item->postulante;
				$asistente->nombre       = $faker->lastName.' '. $faker->firstName;
				$asistente->indicaciones = $faker->paragraph($nbSentences = 3, $variableNbSentences = true); 

				$asistente->save();

        	
        }
    }
}
