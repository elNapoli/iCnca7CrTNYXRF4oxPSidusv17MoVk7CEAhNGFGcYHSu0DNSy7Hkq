<?php namespace App\Http\Controllers;

use App\Http\Requests\ContactoExtranjeroRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use App\ContactoExtranjero;
use App\Postulante;
use Illuminate\Http\Request;

class ContactoEnExtranjeroController extends Controller {

	
	public function getIndex(Guard $auth){
		$postulante = Postulante::where('user_id',$auth->id())->first();

		$parametros = array(
					'postulante' => $postulante->id,
					'nombre_estudiante' => $postulante->nombre." ".$postulante->apellido_paterno." ".$postulante->apellido_materno,
					'n_pasaporte' => $postulante->documentoIdentidadR()->where('tipo', 'p')->first()->numero,
					'ciudad_pais' => $postulante->pregradosR->prePostulacionUniversidadesR->carreraR->facultadR->campusSedesR->ciudadR->nombre.", ". $postulante->pregradosR->prePostulacionUniversidadesR->carreraR->facultadR->campusSedesR->ciudadR->paisR->nombre,
					'nombre_contacto' =>$postulante->pregradosR->preUachsR->preURespnsablesR()->where('tipo','contacto')->first()->nombre,
					'tel_contacto' =>$postulante->pregradosR->preUachsR->preURespnsablesR()->where('tipo','contacto')->first()->telefono_1,
					'parentesco_contacto' =>$postulante->pregradosR->preUachsR->preURespnsablesR()->where('tipo','contacto')->first()->parentesco,
				
				
			);

		$contactoExtranjero = ContactoExtranjero::where('postulante',$postulante->id);
		if($contactoExtranjero->get()->count() != 0){

			$parametros['direccion']       = $contactoExtranjero->first()->direccion;
			$parametros['telefono_1']  = $contactoExtranjero->first()->telefono_1;
			$parametros['telefono_2'] = $contactoExtranjero->first()->telefono_2;
			$parametros['conocido_extranjero'] = $contactoExtranjero->first()->conocido_extranjero;
			$parametros['nombre_seguro'] = $contactoExtranjero->first()->nombre_seguro;
			$parametros['numero_seguro'] = $contactoExtranjero->first()->numero_seguro;
			$parametros['validez_seguro'] = $contactoExtranjero->first()->validez_seguro;
			$parametros['nombre_hospital'] = $contactoExtranjero->first()->nombre_hospital;
			$parametros['direccion_hospital'] = $contactoExtranjero->first()->direccion_hospital;
		}
		return view('contactoExtranjero.index',compact('parametros'));
	}


	public function postStoreAndUpdate(ContactoExtranjeroRequest $request){

		$contactoExtranjero = ContactoExtranjero::firstOrNew(['postulante' => $request->get('postulante')]);
		$contactoExtranjero->fill($request->all());
		$contactoExtranjero->save();

		return response()->json([
				'message'=> 'sus datos de confirmación de llegada se han almacenado correctamente.'
				]);

	}

}
