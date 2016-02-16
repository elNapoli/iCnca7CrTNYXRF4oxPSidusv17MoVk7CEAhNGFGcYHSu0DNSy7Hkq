<?php namespace App\Http\Controllers;

use App\Http\Requests\PrePostulacionUniversidadRequest;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PreOtroFinanciamiento;
use App\Postulante;
use App\Continente;
use App\PrePostulacionUniversidad;
use Illuminate\Http\Request;

class PrePostulacionUniversidadController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


	public function getCreateOrEdit(Guard $auth){
		$continentes = Continente::lists('nombre','id');	
		$postulante = Postulante::where('user_id',$auth->id())->first();
		$prePostulacion = PrePostulacionUniversidad::where('postulante',$postulante->id)->first();
		$parametros = array(
							'id' => '',
							'postulante' => '',						   
							'anio' => '',						   
							'semestre' => '',						   
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
			$parametros['campus_sede'] = $prePostulacion->carreraR->facultadR->campusSedeR->id;
			$parametros['pais'] = $prePostulacion->carreraR->facultadR->campusSedeR->ciudadR->paisR->id;
			$parametros['continente'] = $prePostulacion->carreraR->facultadR->campusSedeR->ciudadR->paisR->continente;
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

		return response()->json([
				'message'=> 'se Guardó la universidad Correctamente'
				]);
	}

	public function putUpdate(PrePostulacionUniversidadRequest $request,Guard $auth){

		$prePostulacion = PrePostulacionUniversidad::find($request->get('id'));

	
		if($prePostulacion->preOtroFinanciamientosR){
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


	
}
