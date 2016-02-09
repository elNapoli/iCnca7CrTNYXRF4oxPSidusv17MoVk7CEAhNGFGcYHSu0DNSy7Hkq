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

        foreach ($postgrado as $item)
        {
            $postotrofinanciamiento = new PostOtroFinanciamiento();

            $postotrofinanciamiento->postulante  = $item->postulante;
            $postotrofinanciamiento->descripcion = $faker->text($maxNbChars = 100) ;

            $postotrofinanciamiento->save();

        }

    }
}
