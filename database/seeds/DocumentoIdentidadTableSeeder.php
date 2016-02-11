<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\DocumentoIdentidad;
use App\Postulante;


class DocumentoIdentidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $tipoPasaporte = array('p','ci');
        $postulante = Postulante::all();
        foreach ($postulante as $item) {
            $documentoIdentidad = new DocumentoIdentidad();

            $documentoIdentidad->tipo       = $tipoPasaporte[$faker->numberBetween($min = 0, $max = 1)];
            $documentoIdentidad->numero     = $faker->creditCardNumber;
            $documentoIdentidad->postulante = $item->id;

            $documentoIdentidad->save();
        }
        





    }
}
