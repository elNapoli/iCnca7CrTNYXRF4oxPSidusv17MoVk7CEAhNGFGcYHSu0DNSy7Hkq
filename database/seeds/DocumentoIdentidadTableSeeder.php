<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\DocumentoIdentidad;


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
        for($i = 0; $i < 80; $i++)
        {
            $documentoIdentidad = new DocumentoIdentidad();

            $documentoIdentidad->tipo       = $tipoPasaporte[$faker->numberBetween($min = 0, $max = 1)];
            $documentoIdentidad->numero     = $faker->creditCardNumber;
            $documentoIdentidad->postulante = $faker->unique->numberBetween($min = 1, $max = 100);

            $documentoIdentidad->save();

        }





    }
}
