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
        
        $CampusSede->save();

        $CampusSede = new CampusSede();

        $CampusSede->nombre         = 'Teja';
        $CampusSede->telefono       = $faker->phoneNumber;
        $CampusSede->fax            = $faker->phoneNumber;
        $CampusSede->sitio_web      = $faker->url;
        $CampusSede->universidad    = 1;
        $CampusSede->ciudad         = 1;
        
        $CampusSede->save();

        $CampusSede = new CampusSede();

        $CampusSede->nombre         = 'Puerto Montt';
        $CampusSede->telefono       = $faker->phoneNumber;
        $CampusSede->fax            = $faker->phoneNumber;
        $CampusSede->sitio_web      = $faker->url;
        $CampusSede->universidad    = 1;
        $CampusSede->ciudad         = 2;
        
        $CampusSede->save();


        
        $universidad = Universidad::all();

        foreach ($universidad as $item){

            $numBeneficio = $faker->numberBetween($min = 1, $max = 5);
            for($i = 0; $i < $numBeneficio; $i++)
            {
                $CampusSede = new CampusSede();

                $CampusSede->nombre    		= $faker->firstName($gender = null|'male'|'female');
                $CampusSede->telefono   	= $faker->phoneNumber;
                $CampusSede->fax 			= $faker->phoneNumber;
                $CampusSede->sitio_web		= $faker->url;
                $CampusSede->universidad	= $item->id;

                $ciudades = Ciudad::where('pais',$item->pais)->get();
                $id_ciudad = array();
                foreach ($ciudades as $key ) {
                    $id_ciudad[] =$key->id;
             
                }

                $CampusSede->ciudad = $id_ciudad[$faker->numberBetween($min = 0, $max = count($id_ciudad)-1)];
                
                $CampusSede->save();

            }
        }





    }
}
