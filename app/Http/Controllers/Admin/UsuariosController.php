<?php namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//use Illuminate\Mail\Mailer;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;

use App\Continente;
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
		$this->middleware('is_admin');
	}

	public function index()
	{

 		$users = User::all();
        return view('admin.indexadmin',compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.usuarios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateUserRequest $request)
	{
		

		/*$data =  Request::all();

		$rules = array(
				'name' =>'required',
				'email'=>'required',
				'password'=>'required'
			);
		$validator = Validator::make($data,$rules);

		if($validator->fails()){
			//dd($validator->errors()); 

			return redirect()->back()
					->withErrors($validator->errors())
					->withInput(Request::except('password'));

		}*/
		$user = User::create($request->all());

		return redirect()->route('admin.usuarios.index');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);
        return view('admin.edit',compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditUserRequest $request,$id)
	{
		$user = User::findOrFail($id);
		$user->fill($request->all());
        $user->save();

        return redirect()->route('admin.usuarios.index');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id, Request $request)
	{
		$user = User::findOrFail($id);
		$user->delete();

		$message = 'El Registro ' . $user->name . ' Fue eliminado';

		if($request->ajax())
		{
			return $message; //falta recargar la pagina para el metodo total que cuenta los usuarios mostrados por pagina :C
		}

		\Session::flash('message',$message);


		return redirect()->route('admin.usuarios.index');
	}

}

