<?php namespace Illuminate\Foundation\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\PasswordBroker;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
trait ResetsPasswords {
	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;
	/**
	 * The password broker implementation.
	 *
	 * @var PasswordBroker
	 */
	protected $passwords;
	/**
	 * Display the form to request a password reset link.
	 *
	 * @return Response
	 */
	public function getEmail()
	{
		return view('auth.password');
	}
	/**
	 * Send a reset link to the given user.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function postEmail(Request $request)
	{
		$this->validate($request, ['email' => 'required|email']);
		$user = User::where('email',$request->get('email'))->first();
		if($user == null)
		{
				return response()->json([
				'codigo' => 0,
				'message'=> 'El correo no existe. Favor verificar'
				]);
		}
		else
		{
				$response = $this->passwords->sendResetLink($request->only('email'), function($m)
					{
					$m->subject($this->getEmailSubject());
					});

				return response()->json([
								'codigo' => 1,
								'message'=> 'Se ha enviado un correo con las indicaciones. Favor revisar'
								]);



		}
	}
	/**
	 * Get the e-mail subject line to be used for the reset link email.
	 *
	 * @return string
	 */
	protected function getEmailSubject()
	{
		return isset($this->subject) ? $this->subject : 'Cambio de contraseña';
	}
	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token))
		{
			throw new NotFoundHttpException;
		}
		return view('auth.reset')->with('token', $token);
	}
	/**
	 * Reset the given user's password.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function postReset(Request $request)
	{
		$this->validate($request, [
			'token' => 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed',
		]);
		$credentials = $request->only(
			'email', 'password', 'password_confirmation', 'token'
		);
		$response = $this->passwords->reset($credentials, function($user, $password)
		{
			$user->password = $password;
			$user->remember_token = null;
			$user->save();
		});
		switch ($response)
		{
			case PasswordBroker::PASSWORD_RESET:
				 $message    = 'La contraseña se ha reseteado exitosamente';
        		\Session::flash('message3', $message);
        		return redirect('auth/login')->with('message3', $message); 
			default:
				return redirect()->back()
							->withInput($request->only('email'))
							->withErrors(['email' => trans($response)]);
		}
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
		return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
	}
}