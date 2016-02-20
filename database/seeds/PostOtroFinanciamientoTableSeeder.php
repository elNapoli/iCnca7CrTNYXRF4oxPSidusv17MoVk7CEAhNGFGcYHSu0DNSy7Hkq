<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\PostOtroFinanciamiento;
use App\Postgrado;

class PostOtroFinanciamientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $postgrado = Postgrado::all();
        $samples_temp = [];

        foreach ($postgrado as $item)
        {
            $samples_temp[] = [
                'postulante' => $item->postulante,
                'descripcion'=> $faker->text($maxNbChars = 100) 
            ];
        }

        PostOtroFinanciamiento::insert($samples_temp);
    }
}
