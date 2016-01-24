<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\PreNoUach;
use App\PreUach;
use App\Pregrado;


class ProcedenciaPregradoTableSeeder extends Seeder
{
    /**
     * Run the database seeds. 
     *
     * @return void
     */
    public function run()
    {
        $faker    = Faker::create();
		$pregrado =  Pregrado::all();

        	foreach ($pregrado as $item)
        	{

        		$noUach = new PreNoUach();
        		$uach   = new PreUach();

				if($faker->numberBetween($min = 0, $max = 1) == 0){
					$noUach->postulante       = $item->postulante;
					$item->procedencia     ='NO UACH'; 

					$item->save();
					$noUach->save();

				}
				else{

					$item->procedencia     ='UACH'; 
					$uach->postulante          = $item->postulante;
					$uach->email_institucional = $faker->email;
					$uach->grupo_sanguineo     = $faker->asciify('GS ***');
					$uach->enfermedades        = $faker->sentence($nbWords = 3, $variableNbWords = true);
					$uach->telefono            = $faker->phoneNumber;
					$uach->ciudad              = $faker->numberBetween($min = 1, $max = 500);

					$item->save();
					$uach->save();

				}
        
        		

        	}
            
       
        

    }
}
