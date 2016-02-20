<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $user = new User();

        $user->name                 = 'AdminMov';
        $user->apellido_paterno     = 'Ap admin';
        $user->apellido_materno     = 'Am admin';
        $user->confirmado           = 1;
        $user->codigo_confirmacion  = str_random();
        $user->tipo_usuario         = 'administrador';
        $user->email                = 'verificacion.mov.uach@gmail.com';
        $user->password             = 'movilidad321';
            
        $user->save();
        $samples_temp = [];

        for($i = 0; $i < 150; $i++)
        {
            
            $samples_temp[] = [
                'name' => $faker->firstName,
                'apellido_paterno'=> $faker->lastName,
                'apellido_materno'=>$faker->lastName ,
                'confirmado'=>$faker->numberBetween($min = 0, $max = 1) ,
                'codigo_confirmacion'=> str_random(),
                'tipo_usuario'=> 'usuario',
                'email'=>$faker->unique->email ,
                'password'=>'secret' 
            ];

        }

         User::insert($samples_temp);






    }
}
