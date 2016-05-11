<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Convenio;
use App\Universidad;

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
            $convenio = $faker->numberBetween($min = 1, $max = 99) ;
            $samples_temp[] = [
                'nombre' => $faker->name,
                'bilateral'=> $bi[$tempBi],
                'universidad'=> $convenio
            ];
            $u = Universidad::find($convenio);
            $u->convenio = 'Si';
            $u->save();
        }
        Convenio::insert($samples_temp);

    }
}
