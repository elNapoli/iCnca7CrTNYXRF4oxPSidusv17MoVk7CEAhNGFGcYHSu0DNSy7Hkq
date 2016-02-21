<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Postgrado;
use App\Postulante;

class PostgradoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();
        $procedencia     = array('UACH', 'NO UACH');
        $samples_temp = [];
		

        for($i = 0; $i < 20; $i++)
        {
            $posgrado     = new Postgrado();
            $idPostulante = $faker->unique->numberBetween($min = 1, $max = 100);
            $postulanteTemp   = Postulante::find($idPostulante);

            $samples_temp[] = [
                'postulante' => $idPostulante,
                'procedencia'=> $procedencia[$faker->numberBetween($min = 0, $max = 1)],
                'titulo_profesional'=>'Título: '. $faker->bs,
                'financiamiento'=>$faker->numberBetween($min = 1, $max = 5)
                ];


            $postulanteTemp->tipo_estudio     = 'Postgrado';
            $postulanteTemp->save();

        }
        Postgrado::insert($samples_temp);

    }
    
}
