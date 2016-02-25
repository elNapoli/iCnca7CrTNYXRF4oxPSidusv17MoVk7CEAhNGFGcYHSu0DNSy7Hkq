<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Cache;

class IsAdmin {


	public function __construct(Guard $auth) //inyeccion de dependencia para reutilizar funciones del middle ya establecido
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$message = 'No posee los permisos de administrador. Ha sido desconectado.';
		if ($this->auth->user()->tipo_usuario != 'administrador')
		{

			$this->auth->logout(); //sacamos al usuario por tratar de entrar a panel admin

			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				\Session::flash('message',$message);
				return redirect()->to('auth/login');
			}
		}
		return $next($request);
	}

}
