<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\ContactoExtranjero;
use App\PreUach;

class ContactoExtranjeroTableSeeder extends Seeder
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


            $cExtranjero = new ContactoExtranjero();

            $cExtranjero->postulante          = $item->postulante;
            $cExtranjero->conocido_extranjero = $faker->paragraph($nbSentences = 3, $variableNbSentences = true); 
            $cExtranjero->direccion           = $faker->address;
            $cExtranjero->telefono_1          = $faker->phoneNumber;
            $cExtranjero->telefono_2          = $faker->phoneNumber;
            $cExtranjero->nombre_seguro       = $faker->sentence($nbWords = 3, $variableNbWords = true);
            $cExtranjero->validez_seguro      = $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now');
            $cExtranjero->numero_seguro       = $faker->swiftBicNumber	;
            $cExtranjero->nombre_hospital     = $faker->sentence($nbWords = 3, $variableNbWords = true);;
            $cExtranjero->direccion_hospital  = $faker->address;


			
            $cExtranjero->save();
        	
        }

        
    }
}
