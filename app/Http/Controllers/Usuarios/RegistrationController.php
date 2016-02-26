<?php namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Http\Request;

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
            $message    = 'El usuario y el codigo para la validacion de email no coinciden. Favor revisar!';
            \Session::flash('message', $message);
            return redirect('auth/login')->with('message1', $message);
        }

        $user->confirmado = 1;
        $user->codigo_confirmacion = null;
        $user->save();

       // Flash::message('You have successfully verified your account.');

        $message    = 'El correo se ha verificado correctamente. ya puedes ingresar';
        \Session::flash('message2', $message);
        return redirect('auth/login')->with('message2', $message);
    }


    public function getVeryfied()
    {
        //$users = User::paginate(4);

        //return view('usuarios.index',compact('users'));;
        dd('controlador registro metodo verificado');//return view('usuario.verif');
    }
}