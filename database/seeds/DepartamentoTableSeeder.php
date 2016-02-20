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
        $samples_temp = [];

        foreach ($campus_sede as $item)
        {
            $samples_temp[] = [
                'tipo' => $tipo[$faker->numberBetween($min = 0, $max = 1)],
                'sitio_web'=> $faker->url,
                'nombre_encargado'=>$faker->firstName.' '.$faker->lastName ,
                'telefono'=>$faker->phoneNumber ,
                'email'=>$faker->email,
                'campus_sede'=> $item->id
            ];
        }  
        Departamento::insert($samples_temp);



    }
}