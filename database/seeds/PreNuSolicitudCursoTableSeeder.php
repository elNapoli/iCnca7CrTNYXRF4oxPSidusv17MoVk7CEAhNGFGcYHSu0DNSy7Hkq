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
        $samples_temp = [];

        foreach ($preNoUach as $item)
        {


            $samples_temp[] = [
                'postulante' => $item->postulante
            ];

        	
        }
        PreNuSolicitudCurso::insert($samples_temp);

        
    }
}
