<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Facultad;
use App\CampusSede;
use App\Funciones\CvsToArray;


class FacultadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $csvFile = public_path().'/archivos_cvs/facultades.csv';
        $areas = new CvsToArray();
        $areas = $areas->csv_to_array($csvFile);
        //dd($areas);
        Facultad::insert($areas);

        // información falsa, una vez finalizado el proyecto hay que eliminar
        $CampusSede =  CampusSede::where('id','>','3')->get();
        $samples_temp = [];

        foreach ($CampusSede as $item) {
            $numFacultad = $faker->numberBetween($min = 3, $max = 10);

            # code...
            for($i = 0; $i < $numFacultad; $i++)
            {
                $samples_temp[] = [
                    'campus_sede' => $item->id,
                    'nombre'=>  $faker->name . ' University',
                    'telefono'=>$faker->phoneNumber
                ];  

            }
        }
        Facultad::insert($samples_temp);


    }
}
