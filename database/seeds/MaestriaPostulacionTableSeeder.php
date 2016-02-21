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
        
        $samples_temp = [];

        foreach ($postgrado as $item)
		{
            $maestria = new MaestriaPostulacion();
            $samples_temp[] = [
                'postulante' => $item->postulante,
                'tipo'=> $faker->numberBetween($min = 0, $max = count($tipos)-1),
                'duracion'=>$faker->numberBetween($min = 1, $max = 3).' Años'
            ];
		}
        MaestriaPostulacion::insert($samples_temp);


    }
}
