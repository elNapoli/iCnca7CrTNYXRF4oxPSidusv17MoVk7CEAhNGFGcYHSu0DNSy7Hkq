<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use App\PrePostulacionUniversidad;
use App\Universidad;
use App\Postulante;
use Illuminate\Http\Request;
class CursosNoUachController extends Controller {

	//

	public function getIndex(){


		$postulante = Postulante::first();

		return view('cursosNoUach.index');
	}


	public function getCursosNoUach(Guard $auth){

		$postulante = Postulante::where('user_id',$auth->id())->first();
		$postulacion = PrePostulacionUniversidad::where('postulante',$postulante->id)->first();

		$universidad_id = $postulacion->carreraR->facultadR->campusSedesR->universidad;
		$carreras = Universidad::join('campus_sede','universidad.id','=','campus_sede.universidad')
								->join('facultad','campus_sede.id','=','facultad.campus_sede')
								->join('carrera','facultad.id','=','carrera.facultad')
								->where('universidad.id',$universidad_id)
								->select('carrera.id','carrera.nombre')
								->orderBy('carrera.nombre')
								->get();



		$solicitudCurso = $postulante->pregradosR->preNoUachsR->preNuSolicitudCursosR;

		if($solicitudCurso){
			
			foreach ($solicitudCurso->detalleSolicitudCursosR()->get() as $item) {
				$parametros[] = array(
									'id' => $item->id,
									'asignatura_codigo' => $item->asignatura,		
									'asignatura_nombre' => $item->asignaturaR->nombre,		
									'semestre' => $item->asignaturaR->periodo,		
									'observaciones' => $item->observaciones,		
									'aceptado' => $item->aceptado,
									'nom_carrera' => $item->asignaturaR->carreraR->nombre,
									'carreras'=> $carreras->toArray());	

				

			}


		}
		$parametros[] =array(
						'id' => '',
						'asignatura' =>'',		
						'observaciones' => '',		
						'aceptado' => '',
						'semestre' => '',
						'carreras'=> $carreras->toArray());	
		//dd($parametros);
		$arra = array('data'=>$parametros);
		return json_encode($arra);




	}
}
