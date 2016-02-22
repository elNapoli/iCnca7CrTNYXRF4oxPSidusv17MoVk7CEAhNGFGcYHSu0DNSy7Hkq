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
        $samples_temp_no_uach = [];
        $samples_temp_uach = [];

        	foreach ($pregrado as $item)
        	{

				if($faker->numberBetween($min = 0, $max = 1) == 0){
					$item->procedencia     ='NO UACH'; 
					$samples_temp_no_uach[] = [
		                'postulante' => $item->postulante
		            ];
					$item->save();

				}
				else{

					$samples_temp_uach[] = [
		                'postulante' =>$item->postulante,
		                'email_institucional'=> $faker->email,
		                'grupo_sanguineo'=>$faker->asciify('GS ***') ,
		                'enfermedades'=> $faker->sentence($nbWords = 3, $variableNbWords = true) ,
		                'telefono'=>$faker->phoneNumber,
		                'ciudad'=> $faker->numberBetween($min = 1, $max = 500),
		                'direccion'=>$faker->address
		            ];

					$item->save();

				}
        
        		

        	}
            

         PreNoUach::insert($samples_temp_no_uach);
         PreUach::insert($samples_temp_uach);

        

    }
}
