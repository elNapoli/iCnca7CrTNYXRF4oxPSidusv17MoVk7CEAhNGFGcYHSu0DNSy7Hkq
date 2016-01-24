<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Continente;

class ContinenteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	    $faker = Faker::create();
        $continente = array('África', 'América','Asia','Europa','Oceanía','Antártida');


        foreach ($continente as $item) {

            $continenteTemp = new Continente();

            $continenteTemp->nombre = $item;

            $continenteTemp->save();
        }
    }



}
