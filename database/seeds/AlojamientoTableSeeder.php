<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Alojamiento;

class AlojamientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $alojamiento = array('Cabaña','Casa','Departamento','Hostal','Pension','Pieza');
        $samples_temp = [];

        for($i = 0; $i < 50; $i++)
        {
            $tempAl = array_rand($alojamiento, 1);
            $samples_temp[] = [
                'tipo'=> $alojamiento[$tempAl],
                'direccion' => $faker->address,
                'precio'=>$faker->numberBetween($min = 30000, $max = 200000),
                'telefono' => $faker->phoneNumber 
            ];
        }
        Alojamiento::insert($samples_temp);

    }
}
