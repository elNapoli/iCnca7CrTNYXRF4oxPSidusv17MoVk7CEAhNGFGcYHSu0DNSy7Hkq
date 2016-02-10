<?php namespace App\Http\Controllers;

use App\Http\Requests\PrePostulacionUniversidadRequest;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PreOtroFinanciamiento;
use App\Postulante;
use App\PrePostulacionUniversidad;
use Illuminate\Http\Request;

class PrePostulacionUniversidadController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function postStore(PrePostulacionUniversidadRequest $request,Guard $auth){
		
		$postulante  = Postulante::where('user_id',$auth->id())->first();
		if($postulante->tipo_estudio === 'Pregrado'){
			$prePostulacion = new PrePostulacionUniversidad($request->all());
			$prePostulacion->postulante = $postulante->id;
			$prePostulacion->save();

			if ($request->has('descripcion'))
			{
			   $otroFinanciamiento = new PreOtroFinanciamiento();
			   $otroFinanciamiento->descripcion = $request->get('descripcion');
			   $otroFinanciamiento->pre_postulacion_universidad = $postulante->id;
			   $otroFinanciamiento->save();
			}
			return response()->json([
				'message'=> 'Se almacenaron los datos de la pestaña referente a intercambio'
				]);
		}

		return response()->json([
				'message'=> 'se Guardó la universidad Correctamente'
				]);
	}

	
}
