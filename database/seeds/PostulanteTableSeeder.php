<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Postulante;

class PostulanteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();


		    //$tipoEstudio = array('PREGRADO','POSTGRADO');

	

        for($i = 0; $i < 100; $i++)
        {
            $postulante = new Postulante();
            $sexo = $faker->numberBetween($min = 0, $max = 1);
           
          if ( $sexo == 0) {
            	$postulante->nombre = $faker->firstNameFemale;
              $postulante->sexo   = 'f';
      		}
      		else{
      			$postulante->nombre =$faker->firstNameMale;
            $postulante->sexo   = 'm';

      		}

      		  
            $postulante->apellido_paterno = $faker->lastName;
            $postulante->apellido_materno = $faker->lastName;
            $postulante->nacionalidad     = $faker->citySuffix;
            $postulante->lugar_nacimiento = $faker->country;
            $postulante->telefono         = $faker->phoneNumber;
            $postulante->email_personal   = $faker->email;
            $postulante->ciudad           = $faker->numberBetween($min = 1, $max = 500);
          //  $postulante->tipo_estudio     = $tipoEstudio[$faker->numberBetween($min = 0, $max = 1)]; esto se llena por consula
            $postulante->direccion        = $faker->address;
            $postulante->user_id          = $faker->numberBetween($min = 1, $max = 18);
            $postulante->fecha_nacimiento = $faker->dateTimeBetween($startDate = '-30 years', $endDate = '-20 years');


            $postulante->save();

        }





    }
}
