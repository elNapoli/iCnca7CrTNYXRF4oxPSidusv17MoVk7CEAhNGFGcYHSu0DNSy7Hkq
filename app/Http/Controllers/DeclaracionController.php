<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Postulante;
use App\Declaracion;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DeclaracionController extends Controller {

	//
	public function getCreateOrEdit(Guard $auth){
			$declaracion = Declaracion::find( Postulante::where('user_id',$auth->id())->first()->id);
		if($declaracion){
			return view('postulacion.declaracion.edit',compact('declaracion'));

		}
		else{
			return view('postulacion.declaracion.create');

		}
	}
	public function postStore(Request $request,Guard $auth){


		$declaracion = new Declaracion();
		$declaracion->fill($request->all());
		$declaracion->postulante = Postulante::where('user_id',$auth->id())->first()->id;
		$declaracion->save();
		return response()->json([
				'message'=> "su declaración se ha guardado exitosamente."
				]);

	}

	public function putUpdate(Request $request,Guard $auth){

		$declaracion = Declaracion::find($request->get('postulante'));
		$declaracion->fill($request->all());
		$declaracion->save();
		return response()->json([
				'message'=> "su declaración se ha actualizado exitosamente."
				]);

	}


}
