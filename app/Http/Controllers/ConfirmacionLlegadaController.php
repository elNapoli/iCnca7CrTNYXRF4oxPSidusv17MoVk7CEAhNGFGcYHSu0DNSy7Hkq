<?php namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PrePostulacionUniversidad;
use App\Postulante;
use Illuminate\Http\Request;

class ConfirmacionLlegadaController extends Controller {

	public function getIndex(Guard $auth){

		$postulante = Postulante::where('user_id',$auth->id())->first();
		$postulacion_universidad = PrePostulacionUniversidad::where('postulante',$postulante->id)->first();
		$parametros = array(
								'nombre_universidad_destino' => $postulacion_universidad->carreraR->facultadR->campusSedesR->universidadR->nombre,
								'nombre_coordinador' => $postulacion_universidad->carreraR->facultadR->campusSedesR->departamentosR()->first()->nombre_encargado,
							    "nombre_estudiante" => $postulante->nombre.' '. $postulante->apellido_paterno.' '.$postulante->apellido_materno,
							);
		return view('confirmacionLlegada.index',compact('parametros'));
	}

}
