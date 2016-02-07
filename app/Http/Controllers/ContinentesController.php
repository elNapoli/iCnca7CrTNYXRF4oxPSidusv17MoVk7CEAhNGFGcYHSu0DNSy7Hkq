<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Continente;
use Illuminate\Http\Request;

class ContinentesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$continentes = Continente::all();

		return view('continentes.index', compact('continentes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return view('continentes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore(Request $request)
	{

		 $this->validate($request, [
        'nombre' => 'required|alpha|unique:continente,nombre',
    	]);
		 
		$continente = Continente::create($request->all());
		$message    = 'El continente '.$request->get('nombre').'se almacenó correctamente';
		return response()->json([
				'message'=> $message
				]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postEdit($id)
	{
		$continente = Continente::findOrFail($id);
        return $continente->toJson();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function putUpdate($id,Request $request)
	{
	
		$this->validate($request, [
        'nombre' => 'required|alpha|unique:continente,nombre,'.$id,
    	]);

		$continente = Continente::findOrFail($id);
		$continente->fill($request->all());
        $continente->save();
        $message    = 'El continente '.$request->get('nombre').'se ha actualizado correctamente';
		return response()->json([
				'message'=> $message
				]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteDestroy($id,Request $request)
	{
		//abort(500);
		$continente = Continente::findOrFail($id);
 		$continente->delete();
 		$message = ' El continente '.$continente->nombre.' Fue eliminado';
 	//	dd($request->all());
		if($request->ajax()){
		//	return($message);
			return response()->json([
				'message'=> $message
				]);
		}
		
		
		\Session::flash('message', $message);

		return redirect('continentes');

		//return redirect()->route('continentes.index');
	}

}
