<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Facultad;
use App\Universidad;
use App\CampusSede;
use Illuminate\Http\Request;

class FacultadesController extends Controller {

	//


	public function getIndex(){
	
		return view('facultades.index');
	}

	public function getCreate(){
	
		$universidades = Universidad::lists('nombre','id');

		return view('facultades.create',compact('universidades'));
	}

	public function getEdit($id)
	{
		$facultad = Facultad::findOrFail($id);
		$universidades = Universidad::lists('nombre','id');
        return view('facultades.edit',compact('universidades','facultad'));
	}

	public function getFacultad()
	{
		$universidades = Facultad::with('CampusSede.universidadR')->orderBy("id")->get();
		
		$arra = array('data'=>$universidades->toArray());
		return json_encode($arra);
	}


	public function postStore(Request $request)
	{


		 
		$continente = facultad::create($request->all());
		$message    = 'Facultad '.$request->get('nombre').' se almacenó correctamente';
		\Session::flash('message', $message);

		//return redirect()->route('continentes.index');
		return redirect('facultades');
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
}
