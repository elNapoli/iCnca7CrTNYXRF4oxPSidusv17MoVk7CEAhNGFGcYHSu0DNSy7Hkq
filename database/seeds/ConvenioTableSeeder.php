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

        for($i = 0; $i < 20; $i++)
        {
            $Convenio = new Convenio();

            $Convenio->nombre       = $faker->name;
            $Convenio->bilateral    = $bi[$tempBi];
            $Convenio->universidad  = $faker->numberBetween($min = 1, $max = 20);

            $Convenio->save();

        }

    }
}
