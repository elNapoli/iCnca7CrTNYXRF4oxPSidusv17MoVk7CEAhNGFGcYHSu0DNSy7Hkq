<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Testimonio;
use App\Postulante;

class TestimonioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $Postulante =  Postulante::all();
        $samples_temp = [];

        foreach ($Postulante as $item) {

                $samples_temp[] = [
                    'postulante' => $item->id,
                    'cuerpo'=>  $faker->text($maxNbChars = 200),
                    'validado' => $faker->numberBetween($min = 0, $max = 1)
                ];  


        }
        Testimonio::insert($samples_temp);
    }
}
