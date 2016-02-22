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
        $samples_temp = [];

        foreach ($preUach as $item){
            $samples_temp[] = [
                'postulante' => $item->postulante,
                'pga'=> $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 100),
                'motivo'=>'' ,
                'fecha'=>$faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now') ,
            ];
        }

        foreach ($preUach as $item){
        	if($faker->numberBetween($min = 0, $max = 1) == 0){
                $samples_temp[] = [
                    'postulante' => $item->postulante,
                    'pga'=> '',
                    'motivo'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true) ,
                    'fecha'=>$faker->dateTimeBetween($startDate = '-30 days', $endDate = 'now') ,
                ];  		
        	}


        }
         Homologacion::insert($samples_temp);


     	 
    }
}
