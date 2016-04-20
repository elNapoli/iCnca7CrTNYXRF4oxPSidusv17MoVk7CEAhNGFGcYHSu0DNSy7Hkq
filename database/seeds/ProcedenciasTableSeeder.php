<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Procedencia;


class ProcedenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genero = new Procedencia();
        $genero->id        = 'UACH';
        $genero->nombre          = 'UACh';
        $genero->save();

        $genero = new Procedencia();
        $genero->id        = 'NO UACH';
        $genero->nombre          = 'No UACh';
        $genero->save();

    }
}
