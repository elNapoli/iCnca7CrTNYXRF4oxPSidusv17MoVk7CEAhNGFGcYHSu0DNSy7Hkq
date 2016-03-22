<?php namespace App\Http\Controllers;

use App\Http\Requests\CursosHomologadosRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Postulante;
use App\Asignatura;
use App\AsignaturaHomologada;
use App\Homologacion;
use Illuminate\Http\Request;

class CursosHomologadosController extends Controller {

	//

	public function getIndex(Guard $auth){
		$postulante = Postulante::where('user_id',$auth->id())->first();
		$carrera_id = $postulante->pregradosR->preUachsR->preUEstudioActualesR->carrera;
		$asignatura = Asignatura::where('carrera',$carrera_id)->first();
		$universidad_destino= $postulante->pregradosR->prePostulacionUniversidadesR->carreraR->facultadR->campusSedesR->universidadR->nombre;
		//dd(($asignatura->toArray()));
		$asignaturas = Asignatura::where('carrera',$carrera_id)->orderBy('codigo')->lists('codigo','codigo')->all();


		$parametros = array(
								'nombre' => $postulante->nombre.' '. $postulante->apellido_paterno,						   
								'email' => $postulante->email_personal,						   
								'carrera' => $postulante->pregradosR->prePostulacionUniversidadesR->carreraR->nombre,						   
								'universidad_destino' => $universidad_destino,						   
								'rut' => $postulante->documentoIdentidadR()->first()->numero,						   
														   
								'telefono' => $postulante->telefono,					   
								'pais_destino' => $postulante->pregradosR->prePostulacionUniversidadesR->carreraR->facultadR->campusSedesR->ciudadR->paisR->nombre,					   
							);
		$homologacion = Homologacion::where('postulante',$postulante->id);
		if($homologacion->get()->count() != 0){
			$parametros['pga'] = $homologacion->first()->pga;
		}
		return view('homologacion.index',compact('parametros','asignaturas'));
	}

	public function getCursosHomologados(Guard $auth){
		$postulante = Postulante::where('user_id',$auth->id())->first();
		$carrera_id = $postulante->pregradosR->preUachsR->preUEstudioActualesR->carrera;
		$asignaturas = Asignatura::where('carrera',$carrera_id)->orderBy('codigo')->lists('codigo','codigo')->all();
		$num_homologacion = Homologacion::where('postulante',$postulante->id)->get()->count();
		if($num_homologacion != 0){


			$cursos_homologados = $postulante->pregradosR->preUachsR->homologacionesR()->first()->asignaturaHomologadaR()->get();
			foreach ($cursos_homologados as $item) {
				# code...
				//dd($item);
			$parametros[] = array(
									'id' => $item->id,
									'periodo' => $item->asignaturaR->periodo,		
									'codigo_1' => $item->asignatura,		
									'asignatura_1' => $item->asignaturaR->nombre,		
									'codigo_2' => $item->codigo_asignatura_intercambio,		
									'asignatura_2' => $item->nombre_asignatura_intercambio,
									'codigo_asignatura'=> $asignaturas);	

			}

		}
		$parametros[] = array(
								'id' => '',

								'periodo' => '',		
								'codigo_1' => '',		
								'asignatura_1' => '',		
								'codigo_2' => '',		
								'asignatura_2' => '',
								'codigo_asignatura'=> $asignaturas);	
		//dd($parametros);
		$arra = array('data'=>$parametros);

		return json_encode($arra);
	}
	public function postDestroy(Request $request){

		$curso_homologado = AsignaturaHomologada::find($request->get('id'));
		$curso_homologado->delete();
		return response()->json([
				'message'=> 'La asignatura se ha eliminado del formulario de homologación.'
				]);


	}
	public function postStore(Guard $auth,CursosHomologadosRequest $request){
		
		$postulante = Postulante::where('user_id',$auth->id())->first();

		$num_homologacion = Homologacion::where('postulante',$postulante->id)->get()->count();
		//dd($num_homologacion);

		if($num_homologacion == 0){

			$homologacion = new Homologacion();
			$homologacion->pga = $request->get('pga');
			$homologacion->postulante = $postulante->id;
			$homologacion->fecha = date("Y-m-d");
			$homologacion->save();
		}
		$homologacion = Homologacion::where('postulante',$postulante->id)->first();
		$curso_homologado =  new AsignaturaHomologada();
		$curso_homologado->homologacion = $homologacion->id;
		$curso_homologado->asignatura = $request->get('codigo_1');
		$curso_homologado->codigo_asignatura_intercambio = $request->get('codigo_2');
		$curso_homologado->nombre_asignatura_intercambio = $request->get('nombre_asignatura_2');
		$curso_homologado->save();
		return response()->json([
				'message'=> 'La asignatura se ha adjuntado a la homologación actual.'
				]);


	}


}