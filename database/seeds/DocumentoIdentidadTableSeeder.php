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
        $samples_temp = [];
        foreach ($postulante as $item) {
            $samples_temp[] = [
                'tipo' => $tipoPasaporte[$faker->numberBetween($min = 0, $max = 1)],
                'numero'=> $faker->creditCardNumber,
                'postulante'=>$item->id
            ];
        }
        DocumentoIdentidad::insert($samples_temp);

        
    }
}
