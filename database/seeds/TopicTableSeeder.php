<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Topic;

class TopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker     = Faker::create();
        $samples_temp = [];

        for($i = 0; $i < 5; $i++)
        {  
            $samples_temp[] = [
                'nombre' => $faker->word,
                'color'=> $faker->hexcolor
            ];

        }
         Topic::insert($samples_temp);
    }
}
