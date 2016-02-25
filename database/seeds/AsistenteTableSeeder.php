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
        $samples_temp = [];

        foreach ($preUach as $item){

            $samples_temp[] = [
                'postulante' => $item->postulante,
                'nombre'=>$faker->lastName.' '. $faker->firstName,
                'indicaciones'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true)
            ];        	
        }

         Asistente::insert($samples_temp);

    }
}
