<?php namespace App\Http\Controllers;

use App\Http\Requests\CretePostulacionRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Continente;
use Illuminate\Contracts\Auth\Guard;
use App\Postulante;
use App\PreUach;
use App\PreNoUach;
use App\Postgrado;
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

			// se verifica si el postulante que se desea cargar es
			if($postulante->tipo_estudio ==='Pregrado'){

				$postulante->pregradosR;
				//verificar si el postulante es de la UACh o no.
				if($postulante->pregradosR->procedencia ==='UACH'){

					$postulante->pregradosR->preUachsR;
				

				}
				else{

					$postulante->pregradosR->preNoUachs;
				}

			}
			else{
				$postulante->postgradosR;


				//en contrucción


			}
		}


		return response()->json([
				'codeError'=> $status,
				'postulante'=> $postulante,
				'documento_identidad' => $documentoIdentidad
				]);

	}
	public function getStepNumber(Guard $auth){

		$step = 0;
		$postulante = Postulante::where('user_id',$auth->id())->first();

		if($postulante){


			$step = 1;
		}
		return response()->json([
			'step'=> $step
			]);
	}
	public function postStore(CretePostulacionRequest $request,Guard $auth){


		$postulante = Postulante::firstOrNew(array('user_id'=> $auth->id()));
		$mensaje = '';
		if($postulante->exists){

			if($postulante->tipo_estudio === 'Pregrado'){
				Pregrado::find($postulante->id)->delete();

			}	
			else{
				Postgrado::find($postulante->id)->delete();
				

			}


			$postulante->fill($request->all());
			$postulante->save();

			$documento = DocumentoIdentidad::where('postulante',$postulante->id)->first();
			$documento->fill($request->all());
			$documento->save();


			// se verifica si el alumno va a postular a una carrera de pregrado o postgrado.
			if($request->get('tipo_estudio') === 'Pregrado'){

				$pregrado = new Pregrado();
				$pregrado->postulante = $postulante->id;
				$pregrado->procedencia = $request->get('procedencia');
				$pregrado->save();

				// se verifica si el estudiante es un alumno entrante o saliente.
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
				$mensaje = 'Su postulación se actualizó correctamente('.$request->get('tipo_estudio') .')';
				
			}

			else{

				$pregrado = new Postgrado();
				$pregrado->postulante = $postulante->id;
				$pregrado->titulo_profesional = $request->get('titulo_profesional');
				$pregrado->save();
				$mensaje = 'Su postulación se actualizó correctamente('.$request->get('tipo_estudio') .')';
				

			}

		}
		else{ // si el postulante no existe:

			//guardo el usuario en la tabla postulante.
			$postulante->fill($request->all());
			$postulante->user_id = $auth->id(); 
			$postulante->save();

			// se almacena el númer de documento que posee el estudiante.
			$documento = new DocumentoIdentidad();
			$documento->postulante = $postulante->id;
			$documento->tipo = $request->get('tipo');
			$documento->numero = $request->get('numero');
			$documento->save();

			// se verifica si el alumno va a postular a una carrera de pregrado o postgrado.
			if($request->get('tipo_estudio') === 'Pregrado'){

				$pregrado = new Pregrado();
				$pregrado->postulante = $postulante->id;
				$pregrado->procedencia = $request->get('procedencia');
				$pregrado->save();

				// se verifica si el estudiante es un alumno entrante o saliente.
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
					$mensaje ='Su postulación se almacenó Exitosamente('.$request->get('procedencia').').';


				}
				else{
					$preNoUach = new PreNoUach();
					$preNoUach->postulante = $postulante->id;
					$preNoUach->save();

					$mensaje ='Su postulación se almacenó Exitosamente('.$request->get('procedencia').').';
				}
				
			}

			else{
				$mensaje = 'el método esta en construcción';
				

			}
		}


		
		return response()->json([
				'message'=> $mensaje
				]);
	}

	public function getPrueba(){
		$continentes = Continente::lists('nombre','id');
		$facultades  = Facultad::lists('nombre','id');

		return view('postulacion.prueba',compact('continentes','facultades'));
	
	}

}
