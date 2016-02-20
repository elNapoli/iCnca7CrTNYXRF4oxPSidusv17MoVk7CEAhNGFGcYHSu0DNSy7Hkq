<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Financiamiento;


class FinanciamientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $financiamiento = array('Padres','Universidad', 'Yo','Beca','Otro');
        $samples_temp = [];


		foreach ($financiamiento as $item) {

            $samples_temp[] = [
                'nombre' => $item
            ];

		}
        Financiamiento::insert($samples_temp);

    }
}
