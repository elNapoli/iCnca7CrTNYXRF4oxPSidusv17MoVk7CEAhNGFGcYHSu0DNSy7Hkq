<?php namespace App\Http\Controllers;

use App\Http\Requests\DeclaracionRequest;
use App\Http\Requests;
use App\Postulante;
use App\Declaracion;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DeclaracionController extends Controller {

	//
	public function getCreateOrEdit(Guard $auth){
		$postulante = Postulante::where('user_id',$auth->id())->first();
		$declaracion = Declaracion::find( $postulante->id);
		
		if($postulante->pregradosR AND $postulante->pregradosR->procedencia === 'UACH'){


			if($declaracion){
				return view('postulacion.declaracion.edit',compact('declaracion'));

			}
			else{
				return view('postulacion.declaracion.create');

			}
		}
		else{

				return view('postulacion.declaracion.no_uach.step_declaracion');

		}
	}
	public function postStore(DeclaracionRequest $request,Guard $auth){


		$declaracion = new Declaracion();
		$declaracion->fill($request->all());
		$declaracion->postulante = Postulante::where('user_id',$auth->id())->first()->id;
		$declaracion->save();
		return response()->json([
				'message'=> "su declaración se ha guardado exitosamente."
				]);

	}

	public function putUpdate(DeclaracionRequest $request,Guard $auth){

		$declaracion = Declaracion::find($request->get('postulante'));
		$declaracion->fill($request->all());
		$declaracion->save();
		return response()->json([
				'message'=> "su declaración se ha actualizado exitosamente."
				]);

	}


}
