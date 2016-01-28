<?php namespace App\Http\Controllers\Usuarios;

use Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;

use App\User;

class RegistrationController extends Controller {

    public function confirm($codigo)
    {

        if( ! $codigo)
        {
            dd('el codio no coincide');
            throw new InvalidConfirmationCodeException;
        }

        $user = User::whereCodigoConfirmacion($codigo)->first();

        if ( ! $user)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user->confirmado = 1;
        $user->codigo_confirmacion = null;
        $user->save();

       // Flash::message('You have successfully verified your account.');

        return view('usuarios.verificado')->with('holiwi');
    }


    public function getVeryfied()
    {
        //$users = User::paginate(4);

        //return view('usuarios.index',compact('users'));;
        dd('controlador registro metodo verificado');//return view('usuario.verif');
    }
}