<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\TipoEstudio;


class TipoEstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genero = new TipoEstudio();
        $genero->id        = 'Postgrado';
        $genero->nombre          = 'Postgrado';
        $genero->save();

        $genero = new TipoEstudio();
        $genero->id        = 'Pregrado';
        $genero->nombre          = 'Pregrado';
        $genero->save();


    }
}