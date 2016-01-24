<?php

use Illuminate\Database\Seeder;
use App\PreNuSolicitudCurso;
use App\PreNoUach;
use Faker\Factory as Faker;

class PreNuSolicitudCursoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker     = Faker::create();
        $preNoUach = PreNoUach::all();

        foreach ($preNoUach as $item)
        {


            $solicitudCurso          = new PreNuSolicitudCurso();

            $solicitudCurso->postulante = $item->postulante;

            $solicitudCurso->save();
        	
        }

        
    }
}
