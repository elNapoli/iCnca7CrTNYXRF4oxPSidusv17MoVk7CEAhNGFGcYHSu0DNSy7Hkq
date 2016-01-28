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

        for($i = 0; $i < 20; $i++)
        {
            $user = new User();

            $user->name                 = $faker->firstName;
            $user->apellido_paterno     = $faker->lastName;
            $user->apellido_materno     = $faker->lastName;
            $user->confirmado           = $faker->numberBetween($min = 0, $max = 1);
            $user->codigo_confirmacion  = str_random();
            $user->tipo_usuario         = 'usuario';
            $user->email                = $faker->unique->email;
            $user->password             = 'secret';
            
            $user->save();

        }





    }
}
