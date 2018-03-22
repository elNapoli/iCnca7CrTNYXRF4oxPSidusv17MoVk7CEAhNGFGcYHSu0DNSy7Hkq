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

	public function getIndex()
	{

 		$users = User::all();
        return view('admin.indexadmin',compact('users'));
	}

	public function getUser()
	{
		$usuarios = User::all();
		$arra = array('data'=>$usuarios->toArray());
		return json_encode($arra);
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

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function putUpdate(Request $request,$id)
	{
		//aca debe ir el correo actual del administrador
		$correo_admin = 'test@gmail.com';
		$user = User::findOrFail($id);
		if($request->confirmado == 2 && $user->confirmado != 2){
			\Mail::send('emails.ban',  array('destinatario' => $request->name, 'correo_admin' => $correo_admin), function($message) {
            $message->to(\Request::get('email'), \Request::get('name'))
                ->subject('OME: Acceso denegado');
        	});
        	$user->fill($request->all());
        	$user->save();
        	return response()->json([
								'message'=> 'EL usuario '.$user->name.' '.$user->apellido_paterno.' ha sido baneado del acceso al portal. Se ha enviado un correo notificandole la situacion.'
								]);
		}
		else if($request->confirmado == 1 && $user->confirmado != 1){
			\Mail::send('emails.validado',  array('destinatario' => $request->name, 'correo_admin' => $correo_admin), function($message) {
            $message->to(\Request::get('email'), \Request::get('name'))
                ->subject('OME: Ya tienes acceso');
        	});
			$user->fill($request->all());
        	$user->save();
        	return response()->json([
								'message'=> 'EL usuario '.$user->name.' '.$user->apellido_paterno.' ha sido validado para el acceso al portal. Se ha enviado un correo notificandole la situacion.'
								]);
		}

		else if($request->confirmado == 3 && $user->confirmado == 2){
			\Mail::send('emails.reactivate',  array('destinatario' => $request->name, 'correo_admin' => $correo_admin), function($message) {
            $message->to(\Request::get('email'), \Request::get('name'))
                ->subject('OME: Acceso restituido');
        	});
			$user->fill($request->all());
        	$user->save();
        	return response()->json([
								'message'=> 'EL usuario '.$user->name.' '.$user->apellido_paterno.' ha sido validado para el acceso al portal. Se ha enviado un correo notificandole la situacion.'
								]);
		}

		//para evitar incongruencias con el modulo que verifica correo.
		else if($request->confirmado == 0 && $user->confirmado != 0){
			return response()->json([
								'message'=> 'No puede cambiar el estado de un usuario que ya ha validado el correo al estado "Por confirmar"... Los cambios no han sido guardados. Intente otra opción',
								'fail' => 1
								]);
		}

		//para evitar incongruencias con el modulo que verifica correo.
		else if($request->confirmado == 3 && $user->confirmado != 2){
			return response()->json([
								'message'=> 'No puede cambiar el estado de un usuario a "Acceso restituido" si este no se encuentra actualmente con estado "Acceso denegado"... Los cambios no han sido guardados. Intente otra opción',
								'fail' => 1
								]);
		}

		else{
			$user->fill($request->all());
        	$user->save();
			return response()->json([
								'message'=> 'EL usuario '.$user->name.' '.$user->apellido_paterno.' '.$user->apellido_materno.' se editó correctamente'
								]);
		}


    }
	public function postEdit($id)
	{
		$user = User::findOrFail($id);
        return $user->toJson();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDestroy($id, Request $request)
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

