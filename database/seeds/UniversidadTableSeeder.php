<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Universidad;
use App\Ciudad;
class UniversidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $Universidad = new Universidad();

        $Universidad->nombre     = 'Universidad Austral de Chile';
        $Universidad->pais     = 1;


        $Universidad->save();
        $samples_temp = [];

        for($i = 0; $i < 100; $i++)
        {

            
           


            $id_pais =$faker->numberBetween($min = 1, $max = 199);
            $ciudad = Ciudad::where('pais',$id_pais)->get();
    
            while($ciudad->count() == 0){
                $id_pais =$faker->numberBetween($min = 1, $max = 199);
                $ciudad = Ciudad::where('pais',$id_pais)->get();
            }

            $samples_temp[] = [
                'nombre' => $faker->name . ' University',
                'pais'=> $id_pais
            ];

        }
        Universidad::insert($samples_temp);


    }
}
