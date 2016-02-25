<?php namespace App\Http\Controllers\Usuarios;

use Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;

use App\User;
use Validator;

class UsuariosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
 		//$users = User::paginate(4);

        //return view('usuarios.index',compact('users'));;
        return view('usuarios.index');
	}
	public function getPortaluser()
	{
		return view('usuarios.portaluser');
	}
	
}