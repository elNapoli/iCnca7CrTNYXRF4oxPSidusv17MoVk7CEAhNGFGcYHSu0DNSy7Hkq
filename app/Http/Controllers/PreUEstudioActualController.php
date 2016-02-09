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
		if($postulante->tipo_estudio === 'Pregrado'){

			if($postulante->pregradosR->procedencia === 'UACH'){

				$preEstudioActual = new PreUEstudioActual($request->all());
				$preEstudioActual->postulante = $postulante->id;

				$preEstudioActual->save();
				return response()->json([
					'message'=> 'Se guardó exitosamente los datos referente a estudios '
					]);

			}
			else{ 


			}
			


		}
		else{

		}



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
