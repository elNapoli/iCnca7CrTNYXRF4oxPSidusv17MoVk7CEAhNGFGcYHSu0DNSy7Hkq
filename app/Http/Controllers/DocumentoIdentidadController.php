<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use  App\DocumentoIdentidad;
use  App\Postulante;
use Illuminate\Http\Request;

class DocumentoIdentidadController extends Controller {




	public function getIndex(){

		return view('documentoIdentidad.index');
	}
	public function postDestroy(Request $request){

		$universidad = DocumentoIdentidad::findOrFail($request->get('id'));
 		$universidad->delete();
 		return response()->json([
				'message'=> 'El Documento de identidad se ha eliminado exitosamente'
				]);

	
	}
	//


	public function getDocumentosByPostulante(Guard $auth, Request $request){

		$postulante = Postulante::where('user_id', $auth->id())->first();
		if($postulante){

			return json_encode(array('data'=>DocumentoIdentidad::where('postulante',$postulante->id)->get()->toArray()));

		}
		else{
			return json_encode(array('data'=>[]));

		}
	}

	public function postStoreAndUpdate(Request $request,Guard $auth){
		$this->validate($request, [
        'numero' => 'required',
        'tipo'   => 'required'
    	]);
		$postulante = Postulante::where('user_id', $auth->id())->first();

		
		$documento = DocumentoIdentidad::firstOrNew(array('tipo'=> $request->get('tipo'),'postulante'=>$postulante->id));
		$documento->numero = $request->get('numero') ;
		$documento->save();
		return response()->json([
				'message'=> 'Se almacenó los datos del documento de identidad  correctamente.'
				]);
	}

}
