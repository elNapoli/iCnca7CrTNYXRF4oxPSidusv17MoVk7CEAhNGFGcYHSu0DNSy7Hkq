<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\DetalleSolicitudCurso;
use App\PreNuSolicitudCurso;
use App\Postulante;
use Illuminate\Http\Request;

class SolicitudCursoController extends Controller {

	//


	public function postStoreAndUpdate(Guard $auth, Request $request){


		$postulante = Postulante::where('user_id',$auth->id())->first();



		$solicitudCurso = PreNuSolicitudCurso::firstOrNew(array('postulante'=> $postulante->id));
		$solicitudCurso->save();

		$detalleSolicitud = new DetalleSolicitudCurso();
		$detalleSolicitud->solicitud_curso = $solicitudCurso->id;
		$detalleSolicitud->asignatura = $request->get('asignatura');
		$detalleSolicitud->save();



	}

}
