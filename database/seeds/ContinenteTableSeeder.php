<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Continente;
use App\Http\Controllers\CvsToArray;

class ContinenteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = public_path().'\archivos_cvs\continentes.csv';

        $continentes = new CvsToArray();
        $continentes = $continentes->csv_to_array($csvFile);
       // dd($continentes);
        Continente::insert($continentes);
    }



}
