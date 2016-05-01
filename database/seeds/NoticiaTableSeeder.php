<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Noticia;
use App\User;

class NoticiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $User =  User::all();
        $samples_temp = [];

        for($i = 0; $i < 50; $i++)
        {  

                $samples_temp[] = [
                    'user' => 1,
                    'cuerpo'=>  $faker->text($maxNbChars = 200),
                    'titulo'=>  $faker->sentence($nbWords = 4, $variableNbWords = true),
                    'resumen'=>  $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                    'foto'=> 'path',
                    'carousel' => 'no'
                ];  


        }
        Noticia::insert($samples_temp);
    }
}
