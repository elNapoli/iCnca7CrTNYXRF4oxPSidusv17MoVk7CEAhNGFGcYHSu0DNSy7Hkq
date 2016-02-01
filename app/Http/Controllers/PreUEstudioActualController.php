<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PreUEstudioActual;
use App\Postulante;

use Illuminate\Http\Request;

class PreUEstudioActualController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore(Request $request){

		$postulante = new PreUEstudioActual($request->all());
		$postulante_id  = Postulante::select('id')->where('user_id',20)->first();
		$postulante->postulante = $postulante_id->id;
		dd($postulante->toArray());
		return response()->json([
				'message'=> 'se Guardó la universidad Correctamente '.$postulante
				]);
	}


	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
