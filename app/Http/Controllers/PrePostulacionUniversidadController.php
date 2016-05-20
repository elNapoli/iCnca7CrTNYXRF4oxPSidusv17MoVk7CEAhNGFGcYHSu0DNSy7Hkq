<?php namespace App\Http\Controllers;

use App\Http\Requests\PrePostulacionUniversidadRequest;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PreOtroFinanciamiento;
use App\Postulante;
use App\Continente;
use App\PostPostulacionUniversidad;
use App\PostOtroFinanciamiento;
use App\PrePostulacionUniversidad;
use Illuminate\Http\Request;

class PrePostulacionUniversidadController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


	public function getCreateOrEdit(Guard $auth){
		$continentes = Continente::lists('nombre','id')->all();	
		$postulante = Postulante::where('user_id',$auth->id())->first();
		$parametros = array(
							'id' => '',
							'postulante' => '',						   
							'anio' => '',						   
							'semestre' => '',	
							'tipo_estudio' => $postulante->tipo_estudio,					   
							'desde' => '',						   
							'hasta' =>'',						   
							'financiamiento' => '1',						   
							'financiamiento_nombre' => 'Padres',						   
							'carrera' => '',						   
							'facultad' => '',						   
							'campus_sede' => '',						   
							'pais' => '',						   
							'continente' => '',						   
							'descripcion' => '',						   

						);

		if($postulante->tipo_estudio === "Pregrado")
		{



			$prePostulacion = PrePostulacionUniversidad::where('postulante',$postulante->id)->first();
			if($prePostulacion){
				$parametros['id'] = $prePostulacion->id;
				$parametros['postulante'] = $prePostulacion->postulante;
				$parametros['anio'] = $prePostulacion->anio;
				$parametros['semestre'] = $prePostulacion->semestre;
				$parametros['desde'] = $prePostulacion->desde;
				$parametros['hasta'] = $prePostulacion->hasta;
				$parametros['financiamiento'] = $prePostulacion->financiamiento;
				$parametros['financiamiento_nombre'] = $prePostulacion->financiamientoR->nombre;
				$parametros['carrera'] = $prePostulacion->carrera;
				$parametros['facultad'] = $prePostulacion->carreraR->facultadR->id;
				$parametros['campus_sede'] = $prePostulacion->carreraR->facultadR->campusSedesR->id;
				$parametros['pais'] = $prePostulacion->carreraR->facultadR->campusSedesR->ciudadR->paisR->id;
				$parametros['continente'] = $prePostulacion->carreraR->facultadR->campusSedesR->ciudadR->paisR->continente;
				if($prePostulacion->financiamiento == 4 or $prePostulacion->financiamiento == 5){
					$otroFinanciamiento = PreOtroFinanciamiento::find($prePostulacion->id);
					$parametros['descripcion'] = $otroFinanciamiento->descripcion;

			
				}
				//dd($parametros['financiamiento'] == 5);
				//dd($prePostulacion->toArray());
				return view('postulacion.postulacion_universidad.edit',compact('continentes','parametros'));


			}
			else{
				return view('postulacion.postulacion_universidad.create',compact('continentes','parametros'));
			}
		}
		else{

			$postPostulacion = PostPostulacionUniversidad::where('postulante',$postulante->id)->first();
			if($postPostulacion)
			{
				$parametros['id'] = $postPostulacion->id;
				$parametros['programa'] = $postPostulacion->tipo;
				$parametros['instituto'] = $postPostulacion->instituto;
				$parametros['nomLab'] = $postPostulacion->laboratorio;
				$parametros['contacto'] = $postPostulacion->contacto_uach;
				$parametros['area'] = $postPostulacion->area;
				$parametros['nombreP'] = $postPostulacion->nombre_maestria;
				$parametros['postulante'] = $postPostulacion->postulante;
				$parametros['anio'] = $postPostulacion->anio;
				$parametros['semestre'] = $postPostulacion->duracion;
				$parametros['financiamiento'] = $postPostulacion->financiamiento;
				$parametros['financiamiento_nombre'] = $postPostulacion->financiamientoR->nombre;
				$parametros['desde'] = $postPostulacion->desde;
				$parametros['hasta'] = $postPostulacion->hasta;
				$parametros['facultad'] = $postPostulacion->facultad;
				$parametros['campus_sede'] = $postPostulacion->facultadR->campusSedesR->id;
				$parametros['pais'] = $postPostulacion->facultadR->campusSedesR->ciudadR->paisR->id;
				$parametros['continente'] = $postPostulacion->facultadR->campusSedesR->ciudadR->paisR->continente;

				if($postPostulacion->financiamiento == 4 or $postPostulacion->financiamiento == 5){
					$otroFinanciamiento = PostOtroFinanciamiento::find($postPostulacion->postulante);
					$parametros['descripcion'] = $otroFinanciamiento->descripcion;

			
				}
				return view('postulacion.postulacion_universidad.edit',compact('continentes','parametros'));

			}
			else
			{
				return view('postulacion.postulacion_universidad.create',compact('continentes','parametros'));



			}
		}
	}
	public function postStore(PrePostulacionUniversidadRequest $request,Guard $auth){
		
		$postulante  = Postulante::where('user_id',$auth->id())->first();
		if($postulante->tipo_estudio === 'Pregrado'){
			$prePostulacion = new PrePostulacionUniversidad($request->all());
			$prePostulacion->postulante = $postulante->id;
			$prePostulacion->save();

			if ($request->get('financiamiento') ==='4' or $request->get('financiamiento') ==='5')
			{
			   $otroFinanciamiento = new PreOtroFinanciamiento();
			   $otroFinanciamiento->descripcion = $request->get('descripcion');
			   $otroFinanciamiento->pre_postulacion_universidad = $prePostulacion->id;
			   $otroFinanciamiento->save();
			}
			return response()->json([
				'message'=> 'Se almacenaron los datos de la pestaña referente a intercambio'
				]);
		}


		else{


			$postPostulacion = new PostPostulacionUniversidad();

			$postPostulacion->postulante = $postulante->id;
			$postPostulacion->tipo = $request->get('programa');
			$postPostulacion->anio = $request->get('anio');
			$postPostulacion->duracion = $request->get('semestre');
			$postPostulacion->desde = $request->get('desde');
			$postPostulacion->hasta = $request->get('hasta');
			$postPostulacion->area = $request->get('area');
			$postPostulacion->nombre_maestria = $request->get('nombreP');
			$postPostulacion->laboratorio = $request->get('nomLab');
			$postPostulacion->contacto_uach = $request->get('contacto');
			$postPostulacion->instituto = $request->get('instituto');
			$postPostulacion->facultad = $request->get('facultad');
			$postPostulacion->financiamiento = $request->get('financiamiento');
			if ($request->get('financiamiento') ==='4' or $request->get('financiamiento') ==='5')
			{
			   $otroFinanciamiento = new PostOtroFinanciamiento();
			   $otroFinanciamiento->descripcion = $request->get('descripcion');
			   $otroFinanciamiento->postulante = $postPostulacion->postulante;
			   $otroFinanciamiento->save();
			}

			$postPostulacion->save();
		}

		return response()->json([
				'message'=> 'Se guardaron correctamente sus adtos de intercambio'
				]);
	}

	public function putUpdate(PrePostulacionUniversidadRequest $request,Guard $auth){

		$postulante  = Postulante::where('user_id',$auth->id())->first();




		if($postulante->tipo_estudio === "Pregrado"){

			$prePostulacion = PrePostulacionUniversidad::find($request->get('id'));

			//dd();
			if($prePostulacion->preOtroFinanciamientosR->count()){
				if ($request->get('financiamiento') != '4'){

					if($request->get('financiamiento') != '5'){

							$otroFinanciamiento = PreOtroFinanciamiento::find($prePostulacion->id);
							$otroFinanciamiento->delete();

					}
				} 
			}
			$prePostulacion->fill($request->all());
			$prePostulacion->save();
			if ($request->get('financiamiento') ==='4' or $request->get('financiamiento') ==='5')
			{
				$otroFinanciamiento = PreOtroFinanciamiento::firstOrNew(array('pre_postulacion_universidad'=> $prePostulacion->id));
				//dd($otroFinanciamiento);
			   	$otroFinanciamiento->descripcion = $request->get('descripcion');
			   	$otroFinanciamiento->save();
			}

			return response()->json([
					'message'=> 'Se han actualizado los datos de la pestaña referente a intercambio'
					]);


			
		}


		else{

			dd("jojo");
		}

	}


	
}
