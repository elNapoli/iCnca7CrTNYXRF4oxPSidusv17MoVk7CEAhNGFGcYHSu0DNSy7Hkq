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
        $español = array('Bajo', 'Medio', 'Alto', 'Nativo');
        $comoSeEntero = array('Internet', 'Noticia', 'Me contó un amigo', 'Correo electronico');


		    //$tipoEstudio = array('PREGRADO','POSTGRADO');

	
          $samples_temp = [];

        for($i = 0; $i < 100; $i++)
        {
            
           $samples_temp[] = [
                'nombre' => $faker->firstName,
                'apellido_paterno'=> $faker->lastName,
                'apellido_materno'=>$faker->lastName ,
                'nacionalidad'=>$faker->citySuffix,
                'nivel_de_español'=>$faker->numberBetween($min = 1, $max = count($español)) ,
                'como_se_entero'=>$faker->numberBetween($min = 1, $max = count($comoSeEntero)) ,
                'lugar_nacimiento'=> $faker->country,
                'telefono'=> $faker->phoneNumber,
                'email_personal'=>$faker->unique->email ,
                'ciudad'=>$faker->numberBetween($min = 1, $max = 42),
                'direccion'=>$faker->address, 
                'user_id'=>$faker->unique->numberBetween($min = 1, $max = 150), 
                'fecha_nacimiento'=>$faker->dateTimeBetween($startDate = '-30 years', $endDate = '-20 years'),
                'sexo'=>$faker->randomElement($array = array ('f','m'))
            ];

        }
        Postulante::insert($samples_temp);
        





    }
}
