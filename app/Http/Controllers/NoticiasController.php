<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Noticia;
use App\User;

class NoticiasController extends Controller {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$noticias = Noticia::all();
		$user = User::all();
		return view('noticias.index', compact('noticias','user'));
		//return view('beneficios.index', compact('beneficios'));
	}

	public function getCrear()
	{
		return view('noticias.create');
		//return view('beneficios.index', compact('beneficios'));
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
/*	public function getCreate()
	{
		return view('beneficios.create');
	}

	public function getBeneficios()
	{
		$beneficios = Beneficio::all();
		$arra = array('data'=>$beneficios->toArray());
		return json_encode($arra);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
/*	public function postStore(Request $request)
	{

		 $this->validate($request, [
        'nombre' => 'required|string|unique:beneficio,nombre',
    	]);
		 
		$beneficio = Beneficio::create($request->all());
		$message    = 'El beneficio '.$request->get('nombre').' se almacenó correctamente';
		return response()->json([
								'codigo' => 1,
								'message' => $message
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
/*	public function postEdit($id)
	{
		$beneficio = Beneficio::findOrFail($id);
        return $beneficio->toJson();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
/*	public function putUpdate($id,Request $request)
	{
	
		$this->validate($request, [
        'nombre' => 'required|string|unique:beneficio,nombre,'.$id,
    	]);

		$beneficio = Beneficio::findOrFail($id);
		$beneficio->nombre = $request->nombre;
        $beneficio->save();
		return response()->json([
								'codigo' => 1,
								'message'=> 'EL beneficio '.$request->nombre.' se editó correctamente'
								]);
        //return redirect()->route('beneficios.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDestroy(Request $request)
	{
		//abort(500);
		$noticia = Noticia::findOrFail($request->get('id'));
 		$noticia->delete();
 		$message = ' La noticia '.$noticia->titulo.' ha sido eliminada';
 	//	dd($request->all());
		if($request->ajax()){
		//	return($message);
			return response()->json([
				'message'=> $message
				]);
		}
		
		
		\Session::flash('message', $message);

		return redirect('noticias');

		//return redirect()->route('beneficios.index');
	}

}