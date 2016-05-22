<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Universidad;
use App\Ciudad;
use App\Funciones\CvsToArray;

class UniversidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = public_path().'/archivos_cvs/universidades.csv';
        $areas = new CvsToArray();
        $areas = $areas->csv_to_array($csvFile);
        //dd($areas);
        Universidad::insert($areas);


    }
}
