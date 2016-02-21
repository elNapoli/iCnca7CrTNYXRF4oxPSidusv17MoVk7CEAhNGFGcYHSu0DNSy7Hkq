<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\PreUResponsable;
use App\PreUach;

class PreUResponsableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker           = Faker::create();
        $preUach         = PreUach::all();
        $tipoResponsable = array('Representante Legal', 'Contacto');
        $samples_temp = [];
        foreach ($preUach as $item)
        {

             $samples_temp[] = [
                'postulante' => $item->postulante,
                'nombre'=>$faker->lastName.' '.$faker->firstName,
                'tipo'=>$tipoResponsable[$faker->numberBetween($min = 0, $max = 1)] ,
                'telefono_1'=> $faker->phoneNumber,
                'telefono_2'=>  $faker->phoneNumber,
                'parentesco'=>$faker->word,
                'email'=>$faker->unique->email ,
                'direccion'=>$faker->address
            ];            

        }
         PreUResponsable::insert($samples_temp);

    }
}
