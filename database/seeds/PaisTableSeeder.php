<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Pais;
use App\Funciones\CvsToArray;


class PaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $csvFile = public_path().'/archivos_cvs/paises.csv';
        $areas = new CvsToArray();
        $areas = $areas->csv_to_array($csvFile);
        //dd($areas);
        Pais::insert($areas);
    }
}
