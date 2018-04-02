<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	//use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function getLogin()
	{
		return view('auth.login');
	}

	public function getLoginAdmin()
	{
		return view('auth.login_admin');
	}

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

	public function postLoginAdmin(Request $request)
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
			if ($user->tipo_usuario != 'administrador'){
				$mensaje =  'Su cuenta es de tipo <strong>Postulante</strong>, porfavor utilice el portal correspondiente <a href="login"><strong>aqui</strong></a>';
			}
			elseif ($this->auth->attempt($credentials, $request->has('remember')))
			{

				$codigo = 1;
				$mensaje =  'administrador';
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
			if ($user->tipo_usuario != 'usuario'){
				$mensaje =  'Su cuenta es de tipo <strong>Administrador</strong>, porfavor utilice el portal correspondiente <a href="login-admin"><strong>aqui</strong></a>';
			}
			elseif ($this->auth->attempt($credentials, $request->has('remember')))
			{

				$codigo = 2;
				$mensaje =  'User';
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

	public function getLogout()
	{
		$this->auth->logout();
		return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
	}

	protected function getFailedLoginMessage()
	{
		return 'These credentials do not match our records.';
	}

	public function redirectPath()
	{
		if (property_exists($this, 'redirectPath'))
		{
			return $this->redirectPath;
		}
		return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
	}

	public function loginPath()
	{
		return property_exists($this, 'loginPath') ? $this->loginPath : '/auth/login';
	}

}
