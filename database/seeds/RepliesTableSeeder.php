<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Socieboy\Forum\Entities\Conversations\Conversation;
use Socieboy\Forum\Entities\Replies\Reply;
class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker     = Faker::create();
        $conversations = Conversation::all();
        $samples_temp = [];

        foreach ($conversations as $item){

            $numRespuestas = $faker->numberBetween($min = 0, $max = 15);

            for($i = 0; $i < $numRespuestas; $i++){

                $samples_temp[] = [
                    'user_id' =>  $faker->numberBetween($min = 1, $max = 150),
                    'conversation_id'=> $item->id,
                    'message' =>  $faker->paragraph($nbSentences = 20, $variableNbSentences = true)
                ];


            }
        }

         Reply::insert($samples_temp);
        
    }
}
