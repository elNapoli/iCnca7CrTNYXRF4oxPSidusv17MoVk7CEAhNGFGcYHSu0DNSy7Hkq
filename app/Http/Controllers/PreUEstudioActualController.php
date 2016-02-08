<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\PreUEstudioActualRequest;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use App\PreUEstudioActual;
use App\Postulante;
use App\Pregrado;
use App\PreUach;
use App\PreNoUach;

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
	public function postStore(PreUEstudioActualRequest $request,Guard $auth){


		$postulante  = Postulante::where('user_id',$auth->id())->first();
		// con esta instrucción se almacena al estudiante que es de pregrado 
		$pregrado = new Pregrado();
		$pregrado->postulante  = $postulante->id;
		$pregrado->procedencia = $request->get('procedencia');
		$pregrado->save();

		if($request->get('procedencia') === 'NO UACH'){
			$preUach = new PreUach();
			$preUach =

		}
		else{


		}

		$preEstudioActual = new PreUEstudioActual($request->all());
		$preEstudioActual->postulante = $postulante->id;

		$preEstudioActual->save();
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
