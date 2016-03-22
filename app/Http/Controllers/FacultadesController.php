<?php namespace App\Http\Controllers;

use App\Http\Requests\FacultadRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Facultad;
use App\Universidad;
use App\CampusSede;
use Illuminate\Http\Request;
use App\Asignatura;

class FacultadesController extends Controller {

	//


	public function getIndex(){
		$universidades = Universidad::orderBy('nombre')->lists('nombre','id')->all();
	
		return view('facultades.index',compact('universidades'));
	}

	public function getFacultades()
	{
		$facultades = Facultad::with('campusSedesR.universidadR')->get();
		$arra = array('data'=>$facultades->toArray());
		return json_encode($arra);
	}

	public function getCreate(){
	
		$universidades = Universidad::lists('nombre','id')->all();

		return view('facultades.create',compact('universidades'));
	}

	public function postEdit($id)
	{
		$facu = Facultad::where('facultad.id',$id)->with('CampusSedesR.universidadR')->first();
		return $facu->toJson();
	}

	public function getFacultad()
	{
		$universidades = Facultad::with('CampusSede.universidadR')->orderBy("id")->get();
		
		$arra = array('data'=>$universidades->toArray());
		return json_encode($arra);
	}


	public function postStore(FacultadRequest $request)
	{


		 
		$continente = facultad::create($request->all());
		$message    = 'Facultad '.$request->get('nombre').' se almacenó correctamente';
		return response()->json([
						'message'=> $message
						]);
	}

	public function postFacultadesByCampus(Request $request){


	
		if($request->ajax()){
			return  Facultad::where('campus_sede',$request->get('idBuscar'))->orderBy("nombre")->get()->toJson();

		}
		else
		{

			return "no ajax";
		}
	}

	public function postCampusByUniversidad(Request $request){


	
		if($request->ajax()){
			return  CampusSede::where('universidad',$request->get('idBuscar'))->get()->toJson();

		}
		else
		{

			return  "no Ajax";
		}
	}
	public function postDestroy($id){
		$facultad = Facultad::findOrFail($id);
 		$facultad->delete();
 		$message = ' La facultad '.$facultad->nombre.' Fue eliminada';
 	//	dd($request->all());

		//	return($message);
		return response()->json([
				'message'=> $message
				]);
		

	}
	public function postUpdate(FacultadRequest $request)
	{
		$facultad = Facultad::findOrFail($request->get('id_facultad'));
		$facultad->fill($request->all());
        $facultad->save();
		return response()->json([
						'message'=> 'La facultad '.$request->nombre.' Correctamente'
						]);
	}

}
