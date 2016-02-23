<?php

use Illuminate\Database\Seeder;
use App\PreNuInscripcionCurso;
use App\DetalleSolicitudCurso;
use Faker\Factory as Faker;

class PreNuInscripcionCursoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker     = Faker::create();
        $detalle = DetalleSolicitudCurso::all();
        $samples_temp = [];

        foreach ($detalle as $item)
        {

            if($item->aceptado === 'si'){

                $samples_temp[] = [
                    'detalle_solicitud_curso' => $item->id,
                    'profesor'=> $faker->lastName.' '.$faker->firstName
                ];
            }

        	
        }

        PreNuInscripcionCurso::insert($samples_temp);
        
    }
}
