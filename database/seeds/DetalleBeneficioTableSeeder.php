<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\DetalleBeneficio;
use App\Asistente;

class DetalleBeneficioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $detalleBeneficio = Asistente::all();
        $samples_temp = [];

        foreach ($detalleBeneficio as $item){

            $numBeneficio = $faker->numberBetween($min = 1, $max = 15);

            for($i = 0; $i < $numBeneficio; $i++){

                $samples_temp[] = [
                    'beneficio' => $i+1,
                    'id_a'=> $item->id
                ];


            }
        }
         DetalleBeneficio::insert($samples_temp);

    }
}
