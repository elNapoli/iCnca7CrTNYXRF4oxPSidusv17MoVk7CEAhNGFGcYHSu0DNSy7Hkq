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
use App\Carrera;
use App\Universidad;
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

	}
	public function getCreateOrEdit(Guard $auth){
		$continentes = Continente::lists('nombre','id');
		$postulante = Postulante::where('user_id',\Auth::id())->first();
		$parametros = array(
							'tipo_estudio' => $postulante->tipo_estudio,
							'postulante' => $postulante->id,						   
							'continente' => 0,						   
							'pais' => 0,						   
							'campus_sede' => 0,						   
							'facultad' => 0,						   
							'carrera' => 0,						   
							'director' => 0,						   
							'email' => 0,						   
							'anio_ingreso' => 0,						   
							'ranking' => 0,						   
							'beneficios' => 0,						   

						);
		$nuevo = 0;
		if($postulante->tipo_estudio === 'Pregrado'){

			$parametros['procedencia'] = $postulante->pregradosR->procedencia ;
			if($postulante->pregradosR->preUachsR){
	
				$nuevo = 1;
				$estudioActual = PreUEstudioActual::where('postulante',$postulante->id)->first();

				$parametros['continente']   = $estudioActual->carreraR->facultadR->campusSedeR->ciudadR->paisR->continente;
				$parametros['pais']         = $estudioActual->carreraR->facultadR->campusSedeR->ciudadR->paisR->id;
				$parametros['campus_sede']  = $estudioActual->carreraR->facultadR->campusSedeR->id;
				$parametros['facultad']     = $estudioActual->carreraR->facultadR->id;
				$parametros['carrera']      = $estudioActual->carrera;
				$parametros['director']     = $estudioActual->carreraR->director;
				$parametros['email']        = $estudioActual->carreraR->email;
				$parametros['anio_ingreso'] = $estudioActual->anio_ingreso;
				$parametros['ranking']      = $estudioActual->ranking;
				$parametros['beneficios']   = $estudioActual->beneficios;

			}
			elseif($postulante->pregradosR->preNoUachsR){

				
			}

		}
		else{
			$parametros['procedencia'] = $postulante->postgradosR->procedencia ;

		}


		// se verifica si existe
		if($nuevo){
			return view('postulacion.estudio_actual.edit',compact('continentes','parametros'));

				//dd('existo');
		}
		else{

			return view('postulacion.estudio_actual.create',compact('continentes','parametros'));
		}

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
