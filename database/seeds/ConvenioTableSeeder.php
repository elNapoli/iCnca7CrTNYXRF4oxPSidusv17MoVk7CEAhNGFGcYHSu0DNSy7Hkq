<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Convenio;
use App\Universidad;
use App\Funciones\CvsToArray;

class ConvenioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = public_path().'/archivos_cvs/convenio.csv';
        $areas = new CvsToArray();
        $areas = $areas->csv_to_array($csvFile);
        //dd($areas);
        Convenio::insert($areas);

    }
}
