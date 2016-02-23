<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use App\PreNuInscripcionCurso;
use App\Postulante;
use App\PreNuSolicitudCurso;
use Illuminate\Http\Request;

class InscripcionCursosController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex(Guard $auth){

		$postulante = Postulante::where('user_id',$auth->id())->first();
		$solicitud = PreNuSolicitudCurso::where('postulante',$postulante->id)->first();
		$detalle = $solicitud->detalleSolicitudCursosR()->get();
		foreach ($detalle as $item) {
			if($item->aceptado ==='si'){
				$inscripcion = PreNuInscripcionCurso::firstOrCreate(array('detalle_solicitud_curso'=>$item->id));
			}
		}

		return view('InscripcionCursos.index');
	}



	public function getCursosInscritosAceptados(Guard $auth){

		$postulante = Postulante::where('user_id',$auth->id())->first();
		$solicitud = PreNuSolicitudCurso::where('postulante',$postulante->id)->first();

		$cursosAceptados = $solicitud->with('detalleSolicitudCursosR.preNuInscripcionCursoR')->get();

		dd($cursosAceptados->toArray());
	}

}
