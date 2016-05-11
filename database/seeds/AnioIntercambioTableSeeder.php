<?php

use Illuminate\Database\Seeder;
use App\AnioIntercambio;
class AnioIntercambioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $samples_temp = [];

        for ($i=1990; $i < 2017; $i++) { 
            # code...
        
        
            $samples_temp[] = [
                'id' => $i,
                'nombre'=> $i
            ];
        }

        AnioIntercambio::insert($samples_temp);
    }
}
