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
        $samples_temp = [];
        

        foreach ($postgrado as $item)
		{
            $samples_temp[] = [
                'postulante' => $item->postulante,
                'nombre'=> $faker->sentence($nbWords = 6, $asText = false),
                'tipo'=>$faker->numberBetween($min = 0, $max = count($tipos)-1) ,
                'nombre_tutor_director'=>$faker->lastName.' '.$faker->firstName,
                'cargo_tutor_director'=> $faker->sentence($nbWords = 6, $asText = false),
                'email_tutor_director'=> $faker->email,
                'telefono_secretaria'=>$faker->phoneNumber,
                'nombre_secretaria'=>$faker->lastName.' '.$faker->firstNameFemale, 
                'area'=>$faker->sentence($nbWords = 6, $asText = false)
            ];
		}

        MaestriaActual::insert($samples_temp);

    }
}
