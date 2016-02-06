<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateCarreraRequest;
use App\Http\Controllers\Controller;
use App\Universidad;
use App\Carrera;
use App\Continente;

use Illuminate\Http\Request;

class CarrerasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function postCarrerasByFacultad(Request $request){


	
		if($request->ajax()){
			return  Carrera::where('facultad',$request->get('idBuscar'))->get()->toJson();

		}
		else
		{

			return "no ajax";
		}
	}

	public function getIndex()
	{
		$continentes = Continente::lists('nombre','id');




		return view('carreras.index',compact('continentes'));
	}

	public function postEdit($id){

		return Carrera::where('carrera.id',$id)
					->join('facultad','carrera.facultad','=','facultad.id')
					->join('campus_sede','facultad.campus_sede','=','campus_sede.id')
					->join('ciudad','campus_sede.ciudad','=','ciudad.id')
					->join('pais','ciudad.pais','=','pais.id')
					->select('pais.continente as continente','pais.id as pais',
						     'campus_sede.id as campus_sede','facultad.id as facultad',
						     'carrera.id','carrera.nombre','carrera.director','carrera.email')
					->first()->toJson();
		

	}
	public function getCarreras()
	{
		$universidades = Carrera::with('facultadR')->orderBy("id")->get();
		
		$arra = array('data'=>$universidades->toArray());
		//dd(json_encode($arra));
		return json_encode($arra);
	}

	public function postStore(CreateCarreraRequest $request){

		$Carrera = Carrera::create($request->all());
		return response()->json([
				'message'=> 'se Guardó la universidad Correctamente'
				]);
	}

}
