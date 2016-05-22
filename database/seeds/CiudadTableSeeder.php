<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Ciudad;
use App\Pais;


class CiudadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $ciudad = new Ciudad();

        $ciudad->nombre        = 'Valdivia';
        $ciudad->pais          = '1';
        $ciudad->codigo_postal = $faker->postcode;
        $ciudad->save();

        $ciudad = new Ciudad();
        $ciudad->nombre        = 'Puerto Montt';
        $ciudad->pais          = '1';
        $ciudad->codigo_postal = $faker->postcode;
        $ciudad->save();
        $samples_temp = [];
        


        $pais = Pais::all();
        foreach ($pais as $item) {
            # code...

            $samples_temp[] = [
                'nombre' => 'Ciudad de '.$item->nombre,
                'pais'=> $item->id,
                'codigo_postal'=>$faker->postcode
            ];
        }
        Ciudad::insert($samples_temp);





    }
}
