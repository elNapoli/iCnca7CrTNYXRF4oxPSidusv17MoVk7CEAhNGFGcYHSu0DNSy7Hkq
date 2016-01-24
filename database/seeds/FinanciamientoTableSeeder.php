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
        $financiamiento = array('Padres', 'Yo','Beca');


		foreach ($financiamiento as $item) {

            $financiamientoTemp = new Financiamiento();

            $financiamientoTemp->nombre = $item;

            $financiamientoTemp->save();
		}

    }
}
