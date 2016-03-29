<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Alojamiento;

class AlojamientosController extends Controller {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return view('alojamientos.index');
	}

	public function getAlojamiento()
	{
		$alojamiento = Alojamiento::all();
		$arra = array('data'=>$alojamiento->toArray());
		return json_encode($arra);
	}

	public function postDestroy(Request $request)
	{
		//abort(500);
		$alojamiento = Alojamiento::findOrFail($request->get('id'));
 		$alojamiento->delete();
 		$message = ' El alojamiento Fue eliminado';
 	//	dd($request->all());
		if($request->ajax()){
		//	return($message);
			return response()->json([
				'message'=> $message
				]);
		}
		
		
		\Session::flash('message', $message);

		return redirect('alojamientos');

		//return redirect()->route('beneficios.index');
	}

}