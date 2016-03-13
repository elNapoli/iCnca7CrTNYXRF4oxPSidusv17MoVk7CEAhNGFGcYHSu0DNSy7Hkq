<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departamento;
use App\Pais;
use App\Universidad;
use App\CampusSede;

class DepartamentosController extends Controller {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{

		$pais = Pais::lists('nombre','id');
		return view('departamentos.index',compact('pais'));
	}

	public function getDepartamentos()
	{
		$departamentos = Departamento::with('campusSedeR')->get();
		$arra = array('data'=>$departamentos->toArray());
		return json_encode($arra);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$pais = Pais::lists('nombre','id');
		return view('departamentos.create',compact('pais'));
	}

	public function postInfoCoordinador(Request $request){

			return(Departamento::where('campus_sede', $request->get('idCampusSede'))
				->where('tipo', 'Movilidad estudiantil')
				->select('nombre_encargado','telefono','email')
				->first()->toJson());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore(Request $request)
	{

		 $this->validate($request, [
        'tipo' => 'required|string',
        'nombre_encargado' => 'required|string',
        'telefono' => 'required',
        'email' => 'required',
        'campus_sede' => 'required',
    	]);
		
		$departamento = new Departamento();
		$departamento->tipo = $request->tipo;
		$departamento->sitio_web = $request->sitio_web;
		$departamento->nombre_encargado = $request->nombre_encargado;
		$departamento->telefono = $request->telefono;
		$departamento->email = $request->email;
		$departamento->campus_sede = $request->campus_sede;
		$departamento->save();
		//$departamento = Departamento::create($request->all());
		$message    = 'El departamento '.$request->get('tipo').' se almacenó correctamente';
	

		return response()->json([
			'message'=> $message
			]);
	}

		public function postUniversidadByPais(Request $request){


	
		if($request->ajax()){
			return  Universidad::where('pais',$request->get('idBuscar'))->get()->toJson();

		}
		else
		{

			return "no ajax";
		}
	}

		public function postCampusSedeByUniversidad(Request $request){


	
		if($request->ajax()){
			return  CampusSede::where('universidad',$request->get('idBuscar'))->get()->toJson();

		}
		else
		{

			return "no ajax";
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit($id)
	{
		$departamento = Departamento::where('departamento.id',$id)->with('campusSedeR')->first();
        return $departamento->toJson();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function putUpdate($id,Request $request)
	{
		$this->validate($request, [
        'tipo' => 'required|string',
        'nombre_encargado' => 'required|string',
        'telefono' => 'required',
        'email' => 'required',
        'campus_sede' => 'required',
    	]);

		$departamento = Departamento::findOrFail($id);
		$departamento->sitio_web = $request->sitio_web;
		$departamento->nombre_encargado = $request->nombre_encargado;
		$departamento->telefono = $request->telefono;
		$departamento->email = $request->email;
        $departamento->save();
		return response()->json([
								'codigo' => 1,
								'message'=> 'EL departamento se editó correctamente'
								]);
        //return redirect()->route('beneficios.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDestroy(Request $request)
	{
		//abort(500);
		$departamento = Departamento::findOrFail($request->get('id'));
 		$departamento->delete();
 		$message = ' El departamento '.$departamento->tipo.' del campus '.$departamento->campusSedeR->nombre.' Fue eliminado';
 	//	dd($request->all());
		return response()->json([
			'message'=> $message
			]);
	}

}