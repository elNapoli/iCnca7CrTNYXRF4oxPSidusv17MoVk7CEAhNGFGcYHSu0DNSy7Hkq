<?php namespace App\Http\Controllers;

use App\Http\Requests\CretePostulacionRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Continente;
use Illuminate\Contracts\Auth\Guard;
use App\Postulante;
use App\Facultad;
use App\DocumentoIdentidad;
use Illuminate\Http\Request;

class PostulacionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$continentes = Continente::lists('nombre','id');
		$facultades  = Facultad::lists('nombre','id');

		return view('postulacion.index',compact('continentes','facultades'));
	}


	public function postStore(CretePostulacionRequest $request,Guard $auth){


		$postulante = new Postulante($request->all());
		$postulante->user_id = $auth->id(); // modificar con el id del usuario autentificado

		$postulante->save();
		$documento = new DocumentoIdentidad();
		$documento->postulante = $postulante->id;
		$documento->tipo = $request->get('tipo');
		$documento->numero = $request->get('numero');
		$documento->save();
		return response()->json([
				'message'=> 'se Guardó la universidad Correctamente'.$postulante->id
				]);
	}

	public function getPrueba(){

		return view('postulacion.prueba');
	}

}
