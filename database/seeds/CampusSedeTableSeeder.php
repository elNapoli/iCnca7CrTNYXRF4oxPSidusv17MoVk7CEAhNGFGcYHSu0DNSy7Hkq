<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\CampusSede;
use App\Universidad;
use App\Ciudad;

class CampusSedeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $CampusSede = new CampusSede();

        $CampusSede->nombre         = 'Miraflores';
        $CampusSede->telefono       = $faker->phoneNumber;
        $CampusSede->fax            = $faker->phoneNumber;
        $CampusSede->sitio_web      = $faker->url;
        $CampusSede->universidad    = 1;
        $CampusSede->ciudad         = 1;
        $CampusSede->direccion      = $faker->address;
        
        $CampusSede->save();

        $CampusSede = new CampusSede();

        $CampusSede->nombre         = 'Teja';
        $CampusSede->telefono       = $faker->phoneNumber;
        $CampusSede->fax            = $faker->phoneNumber;
        $CampusSede->sitio_web      = $faker->url;
        $CampusSede->universidad    = 1;
        $CampusSede->ciudad         = 1;
        $CampusSede->direccion      = $faker->address;
        
        $CampusSede->save();

        $CampusSede = new CampusSede();

        $CampusSede->nombre         = 'Puerto Montt';
        $CampusSede->telefono       = $faker->phoneNumber;
        $CampusSede->fax            = $faker->phoneNumber;
        $CampusSede->sitio_web      = $faker->url;
        $CampusSede->universidad    = 1;
        $CampusSede->direccion      = $faker->address;
        $CampusSede->ciudad         = 2;
        
        $CampusSede->save();


        
        $universidad = Universidad::all();
        $samples_temp = [];

        foreach ($universidad as $item){

            $numBeneficio = $faker->numberBetween($min = 1, $max = 2);
            for($i = 0; $i < $numBeneficio; $i++)
            {
                $ciudades = Ciudad::where('pais',$item->pais)->get();
                $id_ciudad = array();
                foreach ($ciudades as $key ) {
                    $id_ciudad[] =$key->id;
             
                }

                 $samples_temp[] = [
                    'nombre' => $faker->firstName($gender = null|'male'|'female'),
                    'telefono'=> $faker->phoneNumber,
                    'fax'=>$faker->phoneNumber ,
                    'sitio_web'=>$faker->url ,
                    'universidad'=> $item->id,
                    'ciudad'=> $id_ciudad[$faker->numberBetween($min = 0, $max = count($id_ciudad)-1)],
                    'direccion'   => $faker->address

                ];

            }
        }
        CampusSede::insert($samples_temp);






    }
}
