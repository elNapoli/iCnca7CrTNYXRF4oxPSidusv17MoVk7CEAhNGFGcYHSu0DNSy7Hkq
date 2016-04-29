<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Socieboy\Forum\Entities\Conversations\Conversation;

class ConversationsTableSeeder extends Seeder
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

        for($i = 0; $i < 200; $i++)
        {  
            $samples_temp[] = [
                'user_id' =>  $faker->numberBetween($min = 1, $max = 150),
                'title'=>     $faker->sentence($nbWords = 6, $variableNbWords = true),
                'message' =>  $faker->paragraph($nbSentences = 20, $variableNbSentences = true),
                'topic_id' => $faker->numberBetween($min = 1, $max = 5),
                'slug'=>  $faker->word.'-'.$faker->word.'-'.$faker->word.'-'.$faker->word.'-'.$faker->word
            ];

        }

         Conversation::insert($samples_temp);
        
    }
}
