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
        for($i = 0; $i < 100; $i++)
        {
            $Universidad = new Universidad();

            $Universidad->nombre     = $faker->name . ' University';

            $id_pais =$faker->numberBetween($min = 1, $max = 199);
            $ciudad = Ciudad::where('pais',$id_pais)->get();
    
            while($ciudad->count() == 0){
                $id_pais =$faker->numberBetween($min = 1, $max = 199);
                $ciudad = Ciudad::where('pais',$id_pais)->get();
            }
            $Universidad->pais = $id_pais ;

            $Universidad->save();

        }

    }
}
