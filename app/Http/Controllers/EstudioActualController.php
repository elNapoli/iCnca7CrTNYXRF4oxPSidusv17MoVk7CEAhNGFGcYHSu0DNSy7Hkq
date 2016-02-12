<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\EstudioActualRequest;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use App\PreUEstudioActual;
use App\Postulante;
use App\Pregrado;
use App\Continente;
use App\PreUach;
use App\PreNoUach;

use Illuminate\Http\Request;

class EstudioActualController extends Controller {

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

	public function getDebug(){

			$postulante = Postulante::where('user_id',\Auth::id())->first();
			$parametros = array(
								'tipo_estudio' => $postulante->tipo_estudio,						   
								'postulante' => $postulante->id						   
							);

			if($postulante->tipo_estudio === 'Pregrado'){

				$parametros['procedencia'] = $postulante->pregradosR->procedencia ;
			}
			else{
				$parametros['procedencia'] = $postulante->postgradosR->procedencia ;
			}

			dd($parametros);
	}
	public function getCreateOrEdit(Guard $auth){
		$continentes = Continente::lists('nombre','id');
		$postulante = Postulante::where('user_id',\Auth::id())->first();
		$parametros = array(
							'tipo_estudio' => $postulante->tipo_estudio,
							'postulante' => $postulante->id						   

						);
		if($postulante->tipo_estudio === 'Pregrado'){

			$parametros['procedencia'] = $postulante->pregradosR->procedencia ;
		}
		else{
			$parametros['procedencia'] = $postulante->postgradosR->procedencia ;
		}
		return view('postulacion.estudio_actual.create',compact('continentes','parametros'));

	}

	public function postStore(EstudioActualRequest $request){

		//dd($request->get('procedencia'));
		// verificar si es un postulante a pregrado.
		$mensaje = '';

		if($request->get('tipo_estudio') === 'Pregrado'){

			//se verifica si es un alumno UACh
			if($request->get('procedencia') === 'UACH'){
				$estudioActual =  PreUEstudioActual::create($request->all());
				$mensaje = 'Su estudio actual se almacenó correctamente.';
			}

			else{


			}

		}

		else{


		}

		return response()->json([
				'message'=> $mensaje
				]);
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */




}
