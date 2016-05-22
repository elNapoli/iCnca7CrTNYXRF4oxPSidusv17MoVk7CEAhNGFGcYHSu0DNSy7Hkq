<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Continente;
use App\Funciones\CvsToArray;


class ContinenteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {

        $csvFile = public_path().'/archivos_cvs/continentes.csv';
        $areas = new CvsToArray();
        $areas = $areas->csv_to_array($csvFile);
        //dd($areas);
        Continente::insert($areas);

     }


}
