<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\CampusSede;
use App\Departamento;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker::create();
       $tipo = array('Movilidad estudiantil',
                                'Relaciones internacionales');
        $campus_sede = CampusSede::all();
        foreach ($campus_sede as $item)
        {
            $departamento = new Departamento();         


            $departamento->tipo                 = $tipo[$faker->numberBetween($min = 0, $max = 1)];
            $departamento->sitio_web            = $faker->url;  
            $departamento->nombre_encargado     = $faker->firstName($gender = null|'male'|'female');
            $departamento->telefono             = $faker->phoneNumber;
            $departamento->email                = $faker->email;
            $departamento->campus_sede          = $item->id;

            $departamento->save();

        }  


    }
}