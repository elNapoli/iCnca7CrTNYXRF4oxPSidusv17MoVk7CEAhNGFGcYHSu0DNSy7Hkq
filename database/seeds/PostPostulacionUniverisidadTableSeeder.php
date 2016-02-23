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
        $samples_temp = [];

        foreach ($postgrado as $item){

            $samples_temp[] = [
                'postulante' => $item->postulante,
                'campus_sede'=>$faker->numberBetween($min = 1, $max = 100) ,
                'celular'=>$faker->phoneNumber
            ];


        }
        PostPostulacionUniversidad::insert($samples_temp);
    }
}
