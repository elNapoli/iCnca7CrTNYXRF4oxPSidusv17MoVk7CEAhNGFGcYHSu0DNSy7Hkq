<?php

use Illuminate\Database\Seeder;

use App\MaestriaActual;
use App\Postgrado;
use Faker\Factory as Faker;

class MaestriaActualTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $postgrado = Postgrado::all();

        $tipos = array('Diploma de Postgrado','Experto Universitario','Especialista Universitario', 'Magíster','Doctorado');
        

        foreach ($postgrado as $item)
		{
            $maestria = new MaestriaActual();

            $maestria->postulante            = $item->postulante;
            $maestria->nombre                = $faker->sentence($nbWords = 6, $asText = false);   
            $maestria->tipo                  = $faker->numberBetween($min = 0, $max = count($tipos)-1);
			$maestria->nombre_tutor_director = $faker->lastName.' '.$faker->firstName;
			$maestria->cargo_tutor_director  = $faker->sentence($nbWords = 6, $asText = false);   
			$maestria->email_tutor_director  = $faker->email;
			$maestria->telefono_secretaria   = $faker->phoneNumber;
			$maestria->nombre_secretaria	 = $faker->lastName.' '.$faker->firstNameFemale;
			$maestria->area                  = $faker->sentence($nbWords = 6, $asText = false);   	

            $maestria->save();
		}


    }
}
