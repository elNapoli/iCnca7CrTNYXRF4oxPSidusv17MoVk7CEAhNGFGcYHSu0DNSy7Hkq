<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Correo;

class CorreoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $samples_temp = [];

        for($i = 0; $i < 100; $i++)
        {
            $samples_temp[] = [
                'nombre' => $faker->name,
                'email'=> $faker->email

            ];
        }
        Correo::insert($samples_temp);


    }
}
