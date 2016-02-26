<?php namespace App\Http\Controllers;

use App\Http\Requests\PaisesRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pais;
use Illuminate\Http\Request;
use App\Continente;
class PaisesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$continentes = Continente::lists('nombre','id');

	
		return view('paises.index',compact('continentes'));
	}
	public function getAllPaises(){

		$paises = Pais::with('continenteR')->orderBy("id")->get();
		$arra = array('data'=>$paises->toArray());
		return json_encode($arra);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{	
		$continentes = Continente::lists('nombre','id');



		return view('paises.create',compact('continentes'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore(PaisesRequest $request)
	{

		 
		$continente = Pais::create($request->all());
		$message    = 'El país '.$request->get('nombre').'se almacenó correctamente';
		return response()->json([
				'message'=> $message
				]);

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
		$pais = Pais::with('continenteR')->findOrFail($id);
		return $pais->toJson();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function putUpdate($id, PaisesRequest $request)
	{	


		$pais = Pais::findOrFail($id);

		//dd($pais->toArray());
		$pais->fill($request->all());
        $pais->save();
        $message    = 'El país '.$request->get('nombre').'se almacenó correctamente';
		return response()->json([
				'message'=> $message
				]);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteDestroy($id, Request $request)
	{
		//abort(500);
		$pais = Pais::findOrFail($id);
 		$pais->delete();
 		$message = ' El pais '.$pais->nombre.' Fue eliminado';
		return response()->json([
				'message'=> $message
				]);

	}

}
