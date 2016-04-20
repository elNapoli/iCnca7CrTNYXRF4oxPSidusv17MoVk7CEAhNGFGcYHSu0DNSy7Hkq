<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\DocumentoIdentidad;
use App\Genero;


class GeneroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $genero = new Genero();
        $genero->id        = 'f';
        $genero->nombre          = 'Femenino';
        $genero->save();

        $genero = new Genero();
        $genero->id        = 'm';
        $genero->nombre          = 'Masculino';
        $genero->save();

        
    }
}
