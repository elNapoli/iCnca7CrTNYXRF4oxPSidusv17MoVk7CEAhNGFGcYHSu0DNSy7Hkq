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
        foreach ($preUach as $item)
        {

            $responsable             = new PreUResponsable();

            $responsable->postulante = $item->postulante;
            $responsable->nombre     = $faker->lastName.' '.$faker->firstName;
            $responsable->tipo       = $tipoResponsable[$faker->numberBetween($min = 0, $max = 1)];
            $responsable->telefono_1 = $faker->phoneNumber;
            $responsable->telefono_2 = $faker->phoneNumber;
            $responsable->parentesco = $faker->word;
			$responsable->email      = $faker->email;
			$responsable->direccion  = $faker->address;
			
            $responsable->save();
            

        }
    }
}
