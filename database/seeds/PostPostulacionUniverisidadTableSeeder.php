<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Postgrado;
use App\PostPostulacionUniversidad;



class PostPostulacionUniverisidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker     = Faker::create();
        $postgrado = Postgrado::all();

        foreach ($postgrado as $item){

			$postpostulacionuniversidad = new PostPostulacionUniversidad();

            $postpostulacionuniversidad->postulante  = $item->postulante;
            $postpostulacionuniversidad->campus_sede = $faker->numberBetween($min = 1, $max = 20) ;
            $postpostulacionuniversidad->celular = $faker->phoneNumber;
            $postpostulacionuniversidad->procedencia = 'UACH'; //FIJO POR DEBUG

            $postpostulacionuniversidad->save();
        }
    }
}
