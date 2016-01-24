<?php

use Illuminate\Database\Seeder;
use App\MaestriaPostulacion;
use App\Postgrado;
use Faker\Factory as Faker;
class MaestriaPostulacionTableSeeder extends Seeder
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
            $maestria = new MaestriaPostulacion();

            $maestria->postulante =  $item->postulante;
            $maestria->tipo       =  $faker->numberBetween($min = 0, $max = count($tipos)-1);
            $maestria->duracion   = $faker->numberBetween($min = 1, $max = 3).' Años';

            $maestria->save();
		}


    }
}
