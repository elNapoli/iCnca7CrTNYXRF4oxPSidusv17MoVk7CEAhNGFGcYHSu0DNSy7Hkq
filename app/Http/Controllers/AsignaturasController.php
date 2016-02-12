<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Asignatura;
use App\Universidad;
use App\Carrera;

class AsignaturasController extends Controller {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return view('asignaturas.index');
	}

	public function getAsignaturas()
	{
		$asignaturas = Asignatura::with('carreraR.facultadR.campusSedeR.universidadR')->get();
		$arra = array('data'=>$asignaturas->toArray());
		return json_encode($arra);
	}

	public function getCreate()
	{
		$universidad = Universidad::lists('nombre','id');
		return view('asignaturas.create',compact('universidad'));
	}

	public function getCarrerasByUniversidad(Request $request){

		$var = Universidad::with('campusSedeR.facultadR.carrerasR')
			->select('nombre')
			->from('carrera')
			->join('facultad','carrera.facultad','=','facultad.id')
			->join('campus_sede','facultad.campus_sede','=','campus_sede')
			->join('universidad','campus_sede.universidad','=','niversidad.id')
			->where('universidad.id','=',6)->get();

		dd($var);

		//select * from carrera join facultad on carrera.facultad = facultad.id join campus_sede on facultad.campus_sede = campus_sede join universidad on campus_sede.universidad = universidad.id where universidad.id = 6 

		/*if($request->ajax()){
			return  Carrera::where('facultadR.campusSedeR.universidadR.id',$request->get('idBuscar'))->get()->toJson();

		}
		else
		{

			return "no ajax";
		}*/
		return dd(Carrera::with('facultadR.campusSedeR.universidadR')->get()->toArray());
	}
}