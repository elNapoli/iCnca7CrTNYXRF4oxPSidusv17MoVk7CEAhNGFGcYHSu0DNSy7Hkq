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

        foreach ($detalle as $item)
        {


            $inscripcion          = new PreNuInscripcionCurso();

            $inscripcion->detalle_solicitud_curso = $item->id;
            $inscripcion->profesor                =$faker->lastName.' '.$faker->firstName;


            $inscripcion->save();
        	
        }

        
    }
}
