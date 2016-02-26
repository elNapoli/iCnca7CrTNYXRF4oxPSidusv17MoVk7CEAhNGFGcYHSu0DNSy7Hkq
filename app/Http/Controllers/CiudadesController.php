<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ciudad;
use App\Continente;
use App\Pais;
use Illuminate\Http\Request;
use App\Http\Requests\CiudadRequest;


class CiudadesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


	public function postCiudadByPais(Request $request){


	
		if($request->ajax()){
			return  Ciudad::where('pais',$request->get('idBuscar'))->orderBy('nombre')->get()->toJson();

		}
		else
		{

			return "no ajax";
		}
	}


	public function postPaisByContinente(Request $request){


	
		if($request->ajax()){
			return  Pais::where('continente',$request->get('idBuscar'))->orderBy('nombre')->get()->toJson();

		}
		else
		{

			return "no ajax";
		}
	}
	public function getIndex()
	{

		//$ciudades = Ciudad::;

		$continentes = Continente::lists('nombre','id');

		return view('ciudades.index',compact('continentes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$continentes = Continente::lists('nombre','id');
		return view('ciudades.create',compact('continentes'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore(CiudadRequest $request)
	{


		 
		$ciudad = Ciudad::create($request->all());
		$message    = 'La ciudad  '.$request->get('nombre').' se almacenó correctamente';
		return response()->json([
				'message'=> $message
				]);
		//return redirect()->route('ciudades.index');
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
	public function postEdit(Request $request)
	{
		$ciudad = Ciudad::getAllRelation($request->get('id'));

		return $ciudad->toJson();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function putUpdate(CiudadRequest $request)
	{


		$ciudad = Ciudad::findOrFail($request->get('id_ciudad'));
		$ciudad->fill($request->all());
        $ciudad->save();
        $message = ' La ciudad '.$ciudad->nombre.' fue actualizada exitosamente.';
		return response()->json([
			'message'=> $message
			]);
	
        //return redirect()->route('ciudades.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDestroy($id,Request $request)
	{
		//abort(500);
		$ciudad = Ciudad::findOrFail($id);
 		$ciudad->delete();
 		$message = ' La ciudad '.$ciudad->nombre.' fue eliminada.';
		return response()->json([
			'message'=> $message
			]);
	
	}

	public function getAllCiudades(){

		$ciudades = Ciudad::getAllRelation();

		$arra = array('data'=>$ciudades->toArray());
		return json_encode($arra);
	}

}
