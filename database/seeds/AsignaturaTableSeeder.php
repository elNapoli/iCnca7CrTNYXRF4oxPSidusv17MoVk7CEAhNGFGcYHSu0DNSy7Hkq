<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Asignatura;
use App\Carrera;

class AsignaturaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $carrara = Carrera::all();

        for($i = 0; $i < 30; $i ++)
        {
            foreach ($carrara as $item){

                $asignatura = new Asignatura;
        
                $asignatura->codigo = $faker->bothify('???###');
                $asignatura->nombre = $faker->sentence($nbWords = 3, $variableNbWords = true);
                $asignatura->nivel = $faker->numberBetween($min = 1, $max = 12);
                $asignatura->anio = $faker->numberBetween($min = 1, $max = 6);
                $asignatura->carrera = $item->id;

                $asignatura->save();

            }


     	 }
    }
}
