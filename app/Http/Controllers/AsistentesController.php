<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Asistente;

class AsistentesController extends Controller {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function getPrueba()
	{
		$asistentes = Asistente::with('preUachR.pregradoR.postulanteR')->get();
		dd($asistentes->toArray());
	}

	public function getIndex()
	{
		$asistentes = Asistente::all();

		return view('asistentes.index', compact('asistentes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return view('beneficios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore(Request $request)
	{

		 $this->validate($request, [
        'nombre' => 'required|string|unique:beneficio,nombre',
    	]);
		 
		$beneficio = Asistente::create($request->all());
		$message    = 'El beneficio '.$request->get('nombre').'se almacenó correctamente';
		\Session::flash('message', $message);

		//return redirect()->route('beneficios.index');
		return redirect('beneficios');
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
	public function getEdit($id)
	{
		$beneficio = Asistente::findOrFail($id);
        return view('beneficios.edit',compact('beneficio'));
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
        'nombre' => 'required|string|unique:beneficio,nombre,'.$id,
    	]);

		$beneficio = Asistente::findOrFail($id);
		$beneficio->fill($request->all());
        $beneficio->save();
        \Session::flash('message', 'El Asistente se Editó correctamente');
		return redirect('beneficios');
        //return redirect()->route('beneficios.index');
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
		$beneficio = Asistente::findOrFail($id);
 		$beneficio->delete();
 		$message = ' El beneficio '.$beneficio->nombre.' Fue eliminado';
 	//	dd($request->all());
		if($request->ajax()){
		//	return($message);
			return response()->json([
				'message'=> $message
				]);
		}
		
		
		\Session::flash('message', $message);

		return redirect('beneficios');

		//return redirect()->route('beneficios.index');
	}

}