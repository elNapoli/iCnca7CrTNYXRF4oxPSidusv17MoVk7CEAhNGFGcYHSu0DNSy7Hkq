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
 		$message = ' El registro fue eliminado';
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

	public function postEdit($id)
	{
		$alojamiento = Alojamiento::findOrFail($id);
        return $alojamiento->toJson();
	}

	public function putUpdate($id,Request $request)
	{
	
		$this->validate($request, [
        'tipo' => 'required',
        'direccion' => 'required|string',
        'telefono' => 'required|string',
        'precio' => 'required',
    	]);

		$alojamiento = Alojamiento::findOrFail($id);
		$alojamiento->tipo = $request->tipo;
		$alojamiento->direccion = $request->direccion;
		$alojamiento->telefono = $request->telefono;
		$alojamiento->precio = $request->precio;
        $alojamiento->save();
		return response()->json([
								'codigo' => 1,
								'message'=> 'El alojamiento se editó correctamente'
								]);
        //return redirect()->route('beneficios.index');
	}

	public function postStore(Request $request)
	{

		$this->validate($request, [
        'tipo' => 'required',
        'direccion' => 'required|string',
        'telefono' => 'required|string',
        'precio' => 'required',
    	]);


		$alojamiento = Alojamiento::create($request->all());
		$message    = 'El alojamiento se almacenó correctamente';

		//return redirect()->route('beneficios.index');
		return response()->json([
				'message'=> $message
				]);
	}

}