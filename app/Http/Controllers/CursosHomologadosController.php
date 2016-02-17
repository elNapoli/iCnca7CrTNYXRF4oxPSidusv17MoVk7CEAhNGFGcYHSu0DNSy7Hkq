<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\Postulante;
use App\Asignatura;
use Illuminate\Http\Request;

class CursosHomologadosController extends Controller {

	//

	public function getIndex(Guard $auth){
		$postulante = Postulante::where('user_id',$auth->id())->first();
		$carrera_id = $postulante->pregradosR->preUachsR->preUEstudioActualesR->carrera;
		$asignatura = Asignatura::where('carrera',$carrera_id)->first();
		$universidad_destino= $postulante->pregradosR->prePostulacionUniversidadesR->carreraR->facultadR->campusSedesR->universidadR->nombre;
		//dd(($asignatura->toArray()));

		$parametros = array(
								'nombre' => $postulante->nombre.' '. $postulante->apellido_paterno,						   
								'email' => $postulante->email_personal,						   
								'carrera' => $postulante->pregradosR->prePostulacionUniversidadesR->carreraR->nombre,						   
								'universidad_destino' => $universidad_destino,						   
								'rut' => '',						   
								'telefono' => $postulante->telefono,					   
								'pais_destino' => $postulante->pregradosR->prePostulacionUniversidadesR->carreraR->facultadR->campusSedesR->ciudadR->paisR->nombre,					   
							);
		return view('homologacion.index',compact('parametros'));
	}



}