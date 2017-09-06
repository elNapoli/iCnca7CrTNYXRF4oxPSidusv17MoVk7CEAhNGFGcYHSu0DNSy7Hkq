<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\EstudioActualRequest;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use App\PreNuEstudioActual;
use App\PreUEstudioActual;
use App\Postulante;
use App\Pregrado;
use App\Continente;
use App\PreUach;
use App\Carrera;
use App\Universidad;
use App\MaestriaActual;
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
		$continentes = Continente::lists('nombre','id')->all();
		$postulante = Postulante::where('user_id',\Auth::id())->first();
		$parametros = array(
							'tipo_estudio' => $postulante->tipo_estudio,
							'postulante' => $postulante->id,						   
							'continente' => '',						   
							'pais' => '',						   
							'campus_sede' => '',						   
							'facultad' => '',						   
							'carrera' => '',						   
							'director' => '',						   
							'email' => '',						   
							'anio_ingreso' => '',						   
							'ranking' => '',						   
							'beneficios' => '',						   

						);
		$nuevo = 0;
		//dd(($postulante->pregradosR->preNoUachsR));

		if($postulante->tipo_estudio === 'Pregrado'){

			$parametros['procedencia'] = $postulante->pregradosR->procedencia ;


		//	dd(PreUach::with('preUEstudioActualesR')->get()->postulante);

			if($postulante->pregradosR->procedencia === 'UACH'){

				if($postulante->pregradosR->preUachsR->preUEstudioActualesR){

					$nuevo = 1;
					$estudioActual = PreUEstudioActual::where('postulante',$postulante->id)->first();
					$parametros['continente']   = $estudioActual->carreraR->facultadR->campusSedesR->universidadR->paisR->continente;
					$parametros['pais']         = $estudioActual->carreraR->facultadR->campusSedesR->universidadR->paisR->id;
					$parametros['campus_sede']  = $estudioActual->carreraR->facultadR->campusSedesR->id;
					$parametros['facultad']     = $estudioActual->carreraR->facultadR->id;
					$parametros['carrera']      = $estudioActual->carrera;
					$parametros['director']     = $estudioActual->carreraR->director;
					$parametros['email']        = $estudioActual->carreraR->email;
					$parametros['anio_ingreso'] = $estudioActual->anio_ingreso;
					$parametros['ranking']      = $estudioActual->ranking;
					$parametros['beneficios']   = $estudioActual->beneficios;

				}
						
			}

			else{
				//dd();
				if($postulante->pregradosR->preNoUachsR->preNuEstudioActualesR){

					$nuevo = 1;
					$estudioActual = PreNuEstudioActual::where('postulante',$postulante->id)->first();

					$parametros['continente']     = $estudioActual->campusSedeR->universidadR->paisR->continente;
					$parametros['pais']           = $estudioActual->campusSedeR->universidadR->paisR->id;
					$parametros['campus_sede']    = $estudioActual->campusSedeR->id;
					$parametros['area']           = $estudioActual->area;
					$parametros['anios_cursados'] = $estudioActual->anios_cursados;


				}
			}
				

		}
		else{
				$parametros['procedencia'] = $postulante->postgradosR->procedencia ;
			if($postulante->postgradosR->maestriaActuales->count()){



				$nuevo = 1;
				$estudioActual = MaestriaActual::where('postulante',$postulante->id)->first();
				$parametros['continente'] = $estudioActual->campusSedeR->universidadR->paisR->continente;
				$parametros['pais'] = $estudioActual->campusSedeR->universidadR->paisR->continente;
				$parametros['campus_sede'] = $estudioActual->campusSedeR->id;

				$parametros['nombreD'] = $estudioActual->nombre_tutor_director ;
				$parametros['emailD'] = $estudioActual->email_tutor_director ;
				$parametros['cargoD'] = $estudioActual->cargo_tutor_director ;
				$parametros['nombreS'] = $estudioActual->nombre_secretaria ;
				$parametros['telefonoS'] = $estudioActual->telefono_secretaria ;
				$parametros['area'] = $estudioActual->area ;
				$parametros['programa'] = $estudioActual->tipo ;
				$parametros['nombreP'] = $estudioActual->nombre ;

			}



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

	public function putUpdate(EstudioActualRequest $request){

		//dd($request->get('procedencia'));
		// verificar si es un postulante a pregrado.
		$mensaje = '';

		if($request->get('tipo_estudio') === 'Pregrado'){

			//se verifica si es un alumno UACh
			if($request->get('procedencia') === 'UACH'){
				$estudioActual = PreUEstudioActual::findOrFail($request->get('postulante'));
				$estudioActual->fill($request->all());
				$estudioActual->save();
				$mensaje = 'Su estudio actual se Actualizó correctamente.';
			}

			else{
				$estudioActual = PreNuEstudioActual::findOrFail($request->get('postulante'));
				
				$estudioActual->fill($request->all());
				$estudioActual->save();
				$mensaje = 'Su estudio actual se Actualizó correctamente.';

			}

		}

		else{
			$estudioActual = MaestriaActual::findOrFail($request->get('postulante'));
			$estudioActual->postulante = $request->get('postulante');
			$estudioActual->nombre = $request->get('nombreP');
			$estudioActual->tipo = $request->get('programa');
			$estudioActual->nombre_tutor_director = $request->get('nombreD');
			$estudioActual->cargo_tutor_director   = $request->get('cargoD');
			$estudioActual->email_tutor_director = $request->get('emailD');
			$estudioActual->telefono_secretaria = $request->get('telefonoS');
			$estudioActual->nombre_secretaria = $request->get('nombreS');
			$estudioActual->area = $request->get('area');
			$estudioActual->campus_sede = $request->get('campus_sede');

			$estudioActual->save();

			$mensaje = 'Su maestria actual se actualizó correctamente.';

		}

		return response()->json([
				'message'=> $mensaje
				]);
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
				$estudioActual =  PreNuEstudioActual::create($request->all());
				$mensaje = 'Su estudio actual se almacenó correctamente.';

			}

		}

		else{

			$estudioActual = new MaestriaActual();
			$estudioActual->postulante = $request->get('postulante');
			$estudioActual->nombre = $request->get('nombreP');
			$estudioActual->tipo = $request->get('programa');
			$estudioActual->nombre_tutor_director = $request->get('nombreD');
			$estudioActual->cargo_tutor_director   = $request->get('cargoD');
			$estudioActual->email_tutor_director = $request->get('emailD');
			$estudioActual->telefono_secretaria = $request->get('telefonoS');
			$estudioActual->nombre_secretaria = $request->get('nombreS');
			$estudioActual->area = $request->get('area');
			$estudioActual->campus_sede = $request->get('campus_sede');

			$estudioActual->save();

			$mensaje = 'Su maestria actual se almacenó correctamente.';



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
