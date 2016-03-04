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
		$universidades = Universidad::lists('nombre','id');
		return view('asignaturas.index',compact('universidades'));
	}
	public function getAsignaturas()
	{
		$asignaturas = Asignatura::with('carreraR.facultadR.campusSedesR.universidadR')->get();
		$arra = array('data'=>$asignaturas->toArray());
		return json_encode($arra);
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
		$message    = 'La asignatura "'.$request->get('nombre').'" codigo "'.$request->get('codigo').'" se almacenó correctamente';

		//return redirect()->route('beneficios.index');
		return response()->json([
				'message'=> $message
				]);
	}

	public function postDestroy(Request $request)
	{
		//abort(500);
		$asignatura = Asignatura::where('asignatura.codigo','=',$request->id);
 		$message = ' la asignatura perteneciente al codigo: '.$request->id.' fue eliminada';
 		$asignatura->delete();
 	//	dd($request->all());
		return response()->json([
			'message'=> $message
			]);
	}

	public function postEdit($codigo)
	{
		$asignatura = Asignatura::where('asignatura.codigo','=',$codigo)->with('carreraR.facultadR.campusSedesR.universidadR')->first();
        return $asignatura->toJson();
	}	

	public function putUpdate($codigo,Request $request)
	{
		$this->validate($request, [
        'codigo' => 'required',
        'nombre' => 'required|string',
        'nivel' => 'required',
        'anio' => 'required',
    	]);

		$asignatura = Asignatura::findOrFail($codigo); //paso los datos que se pueden modificar. ya que el 
		$asignatura->codigo = $request->codigo;		//request entrega el nombre de la carrera en vez del
		$asignatura->nombre = $request->nombre;		//id
		$asignatura->nivel = $request->nivel;
		$asignatura->anio = $request->anio;
        $asignatura->save();
		return response()->json([
								'message'=> 'la asignatura perteneciente al codigo: '.$request->codigo.'  fue editada correctamente'
								]);
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