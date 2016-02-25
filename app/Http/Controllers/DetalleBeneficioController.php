<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Asistente;
use App\PreUach;
use App\Postulante;
use App\Beneficio;
use App\DetalleBeneficio;
use App\Ciudad;


class DetalleBeneficioController extends Controller {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		//$departamentos = Departamento::all();

		//return view('departamentos.index', compact('departamentos'));
	}

	public function postAdd(Request $request)
	{
		$detalle = DetalleBeneficio::create($request->all());
 		$message = ' El beneficio fue añadido';
 	//	dd($request->all());
		if($request->ajax()){
		//	return($message);
			return response()->json([
				'message'=> $message
				]);
		}
	}

	public function postDestroy(Request $request)
	{
		//abort(500);
		$detalle = DetalleBeneficio::where('detalle_beneficio.id_a','=',$request->id_a)->where('detalle_beneficio.beneficio','=',$request->id_b)->firstOrFail();
 		$detalle->delete();
 		$message = ' El beneficio  Fue eliminado';
 	//	dd($request->all());
		if($request->ajax()){
		//	return($message);
			return response()->json([
				'message'=> $message
				]);
		}
	}
}