<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Postgrado;
use App\Postulante;

class PostgradoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();
		

        for($i = 0; $i < 20; $i++)
        {
            $posgrado     = new Postgrado();
            $postulanteTemp     = new Postulante();


            $idPostulante = $faker->unique->numberBetween($min = 1, $max = 100);
            $postulanteTemp   = Postulante::find($idPostulante);

            $postulanteTemp->tipo_estudio     = 'Postgrado';
            $posgrado->postulante         = $idPostulante;
            $posgrado->titulo_profesional = 'Título Profesional';
            $posgrado->financiamiento     = $faker->numberBetween($min = 1, $max = 3);

            $posgrado->save();
            $postulanteTemp->save();

        }

    }
    
}
