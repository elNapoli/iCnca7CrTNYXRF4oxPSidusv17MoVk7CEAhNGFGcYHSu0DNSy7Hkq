<?php namespace App\Http\Controllers;

use App\Http\Requests\CretePostulacionRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Continente;
use Illuminate\Contracts\Auth\Guard;
use App\Postulante;
use App\PreUach;
use App\PreNoUach;
use App\Pregrado;
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

	public function postPostulanteByUser(Guard $auth){
		$postulante = Postulante::with('ciudadR.paisR')->where('user_id',$auth->id())->first();
		//dd($postulante->toArray());
		$documentoIdentidad = 0;
		$status = 0;
		if($postulante){
			$status	 = 1;
			// por mientras traeré solo  1 de sus documentos para facilitar programación
			// luego se mejorar
			$documentoIdentidad = DocumentoIdentidad::where('postulante',$postulante->id)->first();
		}
		return response()->json([
				'codeError'=> $status,
				'postulante'=> $postulante,
				'documento_identidad' => $documentoIdentidad
				]);

	}
	public function postStore(CretePostulacionRequest $request,Guard $auth){


		$postulante = new Postulante($request->all());
		
		$postulante->user_id = $auth->id(); 
		$postulante->save();

		$pregrado = new Pregrado();
		$pregrado->postulante = $postulante->id;
		$pregrado->procedencia = $request->get('procedencia');
		$pregrado->save();



		if($request->get('procedencia')==='UACH'){
			$preUach = new PreUach();
			$preUach->postulante = $postulante->id;
			$preUach->email_institucional = $request->get('email_institucional');
			$preUach->grupo_sanguineo = $request->get('grupo_sanguineo');
			$preUach->enfermedades = $request->get('enfermedades');
			$preUach->telefono = $request->get('telefono_2');
			$preUach->ciudad = $request->get('ciudad_2');
			$preUach->direccion = $request->get('direccion_2');
			$preUach->save();

		}
		else{
			$preNoUach = new PreNoUach();
			$preNoUach->postulante = $postulante->id;
			$preNoUach->save();

		}

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
		$continentes = Continente::lists('nombre','id');
		$facultades  = Facultad::lists('nombre','id');

		return view('postulacion.prueba',compact('continentes','facultades'));
	
	}

}
