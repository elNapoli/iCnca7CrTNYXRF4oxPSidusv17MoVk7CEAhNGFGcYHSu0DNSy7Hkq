<?php namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Http\Request;

use App\User;
use Validator;

class UsuariosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */



	public function index(Request $request)
	{
		
 		//$users = User::name($request->get('name'))->paginate(4);
		$users = User::filterAndPaginate($request->get('name'));

	

        return view('usuarios.index',compact('users'));;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('usuarios.create');
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
		\Session::flash('message', 'El usuario se guardo correctamente');
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
        return view('usuarios.edit',compact('user'));
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
        \Session::flash('message', 'El usuario se Editó correctamente');
        return redirect()->route('admin.usuarios.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id,Request $request)
	{

		//abort(500);
		$user = User::findOrFail($id);
 		$user->delete();
 		$message = $user->name. ' El Registro Fue eliminado';
 	//	dd($request->all());
		if($request->ajax()){
		//	return($message);
			return response()->json([
				'message'=> $message
				]);
		}
		
		
		\Session::flash('message', $message);


		return redirect()->route('admin.usuarios.index');
	}

}
