<?php

namespace Illuminate\Foundation\Auth;

trait AuthenticatesAndRegistersUsers
{
    use AuthenticatesUsers, RegistersUsers {
        AuthenticatesUsers::redirectPath insteadof RegistersUsers;
    }
<<<<<<< HEAD

    protected $auth;
	/**
	 * The registrar implementation.
	 *
	 * @var \Illuminate\Contracts\Auth\Registrar
	 */
	protected $registrar;
	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getRegister()
	{
		return view('auth.register');
	}
	/**
	 * Handle a registration request for the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postRegister(Request $request)
	{
		$this->validate($request, [
			'email'=>'required|unique:users,email,', 
			'name' => 'required',
			'apellido_paterno' => 'required',
			'password' => 'required|confirmed',

		]);
		//$this->auth->login($this->registrar->create($request->all()));
		$user = new User($request->all());
		$user->codigo_confirmacion = str_random(); //genero el codigo de confirmacion
		$confirmation_code = $user->codigo_confirmacion; //creo variables por referencia para el Mail::
		$user->avatar = 'avatar.jpg';
		$dest = $user->name;
		$user->save();
        \Mail::send('emails.welcome',  array('destinatario' => $dest, 'codigo' => $confirmation_code), function($message) {
            $message->to(\Request::get('email'), \Request::get('name'))
                ->subject('Confirma tu acceso a Movilidad');
        });
		return response()->json([
				'message'=> 'Gracias por registrarte! Porfavor verifica tu correo electronico.'
				]);

		//return redirect(property_exists($thios, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/')->with('message', $message);
		//return redirect('/')->with('mensaje', $message);
	}
	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogin()
	{
		return view('auth.login');
	}
	/**
	 * Handle a login request to the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email', 'password' => 'required',
		]);
		$credentials = $request->only('email', 'password');
		$user = User::where('email',$request->get('email'))->first();
		$codigo = 0;
		$mensaje = 'Contraseña incorrecta';
		if($user == null){
			return response()->json([
				'codigo' => '0',
				'message'=> 'El correo no existe en nuestros registros'
				]);
		
		}

		if ($user->confirmado == '0')
		{
			$codigo = 0;
			$mensaje =  'Usted no ha validado su mail, porfavor confime su cuenta en el correo que le enviamos.';
		}
		elseif($user->confirmado == '1')
		{
			if ($this->auth->attempt($credentials, $request->has('remember')))
			{
				if ($user->tipo_usuario == 'administrador')
				{
					$codigo = 1;
					$mensaje =  'Administrador';
				}
				else
				{
					$codigo = 2;
					$mensaje =  'User';
				}
			}

			/*	return redirect($this->loginPath())
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => $this->getFailedLoginMessage(),
					]);*/
		}
		elseif($user->confirmado == '2'){
			$codigo = 3;
			$mensaje = "Su acceso ha sido revocado por un administrador. favor comunicarse a correo@prueba.cl";
		}

		return response()->json([
				'codigo' => $codigo,
				'message'=> $mensaje
				]);
		
	}
	/**
	 * Get the failed login message.
	 *
	 * @return string
	 */
	protected function getFailedLoginMessage()
	{
		return 'These credentials do not match our records.';
	}
	/**
	 * Log the user out of the application.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogout()
	{
		$this->auth->logout();
		return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
	}
	/**
	 * Get the post register / login redirect path.
	 *
	 * @return string
	 */
	public function redirectPath()
	{
		if (property_exists($this, 'redirectPath'))
		{
			return $this->redirectPath;
		}
		return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
	}
	/**
	 * Get the path to the login route.
	 *
	 * @return string
	 */
	public function loginPath()
	{
		return property_exists($this, 'loginPath') ? $this->loginPath : '/auth/login';
	}
=======
>>>>>>> afc8cb05faa8df82c9fa06b8627c5b0b66ae323b
}
