<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pais;
use Illuminate\Http\Request;
use App\Continente;
class PaisesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$paises = Pais::with('continenteR')->orderBy("id")->get();
	
		return view('paises.index',compact('paises'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{	
		$continentes = Continente::lists('nombre','id');



		return view('paises.create',compact('continentes'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore(Request $request)
	{
		 $this->validate($request, [
        'nombre'     => 'required|alpha|unique:pais,nombre',
        'continente' => 'required',
    	]);
		 
		$continente = Pais::create($request->all());
		$message    = 'El país '.$request->get('nombre').'se almacenó correctamente';
		\Session::flash('message', $message);

		//return redirect()->route('paises.index');
		return redirect('paises');

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
		$pais = Pais::findOrFail($id);
		$continentes = Continente::lists('nombre','id');
        return view('paises.edit',compact('continentes','pais'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function putUpdate($id, Request $request)
	{	
		//dd('required|unique:pais,nombre,'.$id);
		//dd($request->all());
		$this->validate($request, [
        'nombre'     => 'required|unique:pais,nombre,'.$id,
        'continente' => 'required',
    	]);

		$pais = Pais::findOrFail($id);

		//dd($pais->toArray());
		$pais->fill($request->all());
        $pais->save();
        \Session::flash('message', 'El país se editó correctamente');
      //  return redirect()->route('paises.index');
		return redirect('paises');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteDestroy($id, Request $request)
	{
		//abort(500);
		$pais = Pais::findOrFail($id);
 		$pais->delete();
 		$message = ' El pais '.$pais->nombre.' Fue eliminado';
 	//	dd($request->all());
		if($request->ajax()){
		//	return($message);
			return response()->json([
				'message'=> $message
				]);
		}
		
		
		\Session::flash('message', $message);


		//return redirect()->route('paises.index');
		return redirect('paises');

	}

}
