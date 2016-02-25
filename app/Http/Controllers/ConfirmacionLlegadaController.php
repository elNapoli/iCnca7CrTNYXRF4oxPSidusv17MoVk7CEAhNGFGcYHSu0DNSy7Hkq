<?php namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PrePostulacionUniversidad;
use App\ConfirmacionLlegada;
use App\Postulante;
use Illuminate\Http\Request;

class ConfirmacionLlegadaController extends Controller {

	public function getIndex(Guard $auth){

		$postulante = Postulante::where('user_id',$auth->id())->first();
		$postulacion_universidad = PrePostulacionUniversidad::where('postulante',$postulante->id)->first();

		$parametros = array(	
								'fecha_llegada'=>'',
								'fecha_inicio_curso'=>'',
								'fecha_termino_curso'=>'',
								'postulante' => $postulante->id,
								'nombre_universidad_destino' => $postulacion_universidad->carreraR->facultadR->campusSedesR->universidadR->nombre,
								'nombre_coordinador' => $postulacion_universidad->carreraR->facultadR->campusSedesR->departamentosR()->first()->nombre_encargado,
							    "nombre_estudiante" => $postulante->nombre.' '. $postulante->apellido_paterno.' '.$postulante->apellido_materno,
								'asignaturas_homologadas' => $postulante->pregradosR->preUachsR->homologacionesR()->first()->asignaturaHomologadaR->toArray(),
							);
		$confirmacion = ConfirmacionLlegada::where('postulante',$postulante->id);
		if($confirmacion->get()->count() != 0){

			$parametros['fecha_llegada']       = $confirmacion->first()->fecha_llegada;
			$parametros['fecha_inicio_curso']  = $confirmacion->first()->fecha_inicio_curso;
			$parametros['fecha_termino_curso'] = $confirmacion->first()->fecha_termino_curso;
		}
		return view('confirmacionLlegada.index',compact('parametros'));
	}

	public function postStoreAndUpdate(Request $Request){
		
		$confirmacion = ConfirmacionLlegada::firstOrNew(['postulante' => $Request->get('postulante')]);
		$confirmacion->fill($Request->all());
		$confirmacion->save();
		return response()->json([
				'message'=> 'sus datos de confirmación de llegada se han almacenado correctamente.'
				]);
	}

}
