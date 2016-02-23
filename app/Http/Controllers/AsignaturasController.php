<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Asignatura;
use App\Universidad;
use App\CampusSede;
use App\Facultad;
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
	public function postAsignaturasByCarrera(Request $request){

		$asignaturas = Asignatura::where('carrera',$request->get('idBuscar'))
									->select('codigo as id','nombre')
									->get()
									->toJson();

		return $asignaturas;
	}
	public function postAsignaturaByCodigo(Request $request)
	{

		$asignaturas = Asignatura::with('carreraR.facultadR.campusSedesR.universidadR')->get();
		/*$asignaturas = Asignatura::with('carreraR.facultadR.campusSedeR.universidadR')->get();
		$arra = array('data'=>$asignaturas->toArray());
		return json_encode($arra);*/ // no sé si sobreescribií un método, por lo que preferí comentar lo que estaba en el cuerpo
		$asignaturas = Asignatura::find($request->get('codigoAsignatura'))->toArray();
		return json_encode($asignaturas);
	}

	public function getCreate()
	{
		$universidad = Universidad::lists('nombre','id');
		return view('asignaturas.create',compact('universidad'));
	}


	public function postCampusSedeByUniversidad(Request $request){

		if($request->ajax())
		{
			return  CampusSede::where('universidad',$request->get('idBuscar'))->get()->toJson();
		}
			else
			{
				return "no ajax";
			}
	}

	public function postFacultadByCampusSede(Request $request){

		if($request->ajax())
		{
			return  Facultad::where('campus_sede',$request->get('idBuscar'))->get()->toJson();
		}
			else
			{
				return "no ajax";
			}
	}


	public function postCarrerasByFacultad(Request $request){

		if($request->ajax())
		{
			return  Carrera::where('facultad',$request->get('idBuscar'))->get()->toJson();
		}
			else
			{
				return "no ajax";
			}
	}

	public function postStore(Request $request)
	{

		$this->validate($request, [
        'codigo' => 'required',
        'nombre' => 'required|string',
        'nivel' => 'required',
        'anio' => 'required',
        'carrera' => 'required',
    	]);

		$asignatura = Asignatura::create($request->all());
		$message    = 'La asignatura "'.$request->get('nombre').'" se almacenó correctamente';
		\Session::flash('message', $message);

		//return redirect()->route('beneficios.index');
		return redirect('asignaturas');
	}

	public function postDestroy(Request $request)
	{
		//abort(500);
		$asignatura = Asignatura::where('asignatura.codigo','=',$request->id);
 		$asignatura->delete();
 		$message = ' la asignatura fue eliminada';
 	//	dd($request->all());
		return response()->json([
			'message'=> $message
			]);
	}

	public function getEdit($codigo)
	{
		$asignatura = Asignatura::where('asignatura.codigo','=',$codigo)->first();
        return view('asignaturas.edit',compact('asignatura'));
	}	

	public function putUpdate($codigo,Request $request)
	{
		$this->validate($request, [
        'codigo' => 'required',
        'nombre' => 'required|string',
        'nivel' => 'required',
        'anio' => 'required',
    	]);

		$asignatura = Asignatura::where('asignatura.codigo','=',$codigo)->first();
		$asignatura->fill($request->all());
        $asignatura->save();
        \Session::flash('message', 'La asignatura se editó correctamente');
		return redirect('asignaturas');
        //return redirect()->route('beneficios.index');
	}

/*	public function postCarrerasByUniversidad(Request $request){


		//$var = Universidad::with('campusSedesR.facultadR.carrerasR')
		//	->has('campusSedesR.facultadR.carrerasR')
			//->select('carrera.nombre')
			//->from('carrera')
			//->join('facultad','carrera.facultad','=','facultad.id')
			//->join('campus_sede','facultad.campus_sede','=','campus_sede')
			//->join('universidad','campus_sede.universidad','=','universidad.id')
		//	->where('universidad.id','=',$request->get('idBuscar'))->distinct()->get()->toArray(); // distinct previene repeticiones
		//$var2 = array_pluck($var,'campusSedesR.nombre','id');

		//dd($var2);

		//select * from carrera join facultad on carrera.facultad = facultad.id join campus_sede on facultad.campus_sede = campus_sede join universidad on campus_sede.universidad = universidad.id where universidad.id = 6 

		/*if($request->ajax()){
			return  Carrera::where('facultadR.campusSedeR.universidadR.id',$request->get('idBuscar'))->get()->toJson();

		}
		else
		{

			return "no ajax";
		}*/
	//	return dd(Carrera::with('facultadR.campusSedeR.universidadR')->get()->toArray());
	//}
}