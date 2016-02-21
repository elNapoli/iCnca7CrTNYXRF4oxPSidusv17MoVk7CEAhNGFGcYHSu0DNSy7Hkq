<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Convenio;

class ConvenioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $bi = array('SI','NO');
        $tempBi = array_rand($bi, 1);
        $samples_temp = [];

        for($i = 0; $i < 20; $i++)
        {
            $samples_temp[] = [
                'nombre' => $faker->name,
                'bilateral'=> $bi[$tempBi],
                'universidad'=>$faker->numberBetween($min = 1, $max = 99) 
            ];
        }
        Convenio::insert($samples_temp);

    }
}
