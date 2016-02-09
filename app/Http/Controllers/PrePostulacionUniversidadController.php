<?php namespace App\Http\Controllers;

use App\Http\Requests\PrePostulacionUniversidadRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Postulante;
use App\PrePostulacionUniversidad;
use Illuminate\Http\Request;

class PrePostulacionUniversidadController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function postStore(PrePostulacionUniversidadRequest $request){
		dd("hola");
		$postulante = Postulante::where('user_id',18)->first();
		//dd($postulante->toArray());
		$prePostulacion = new PrePostulacionUniversidad($request->all());
		$prePostulacion->postulante = $postulante->id;

		$prePostulacion->save();
		return response()->json([
				'message'=> 'se Guardó la universidad Correctamente'
				]);
	}

	
}
