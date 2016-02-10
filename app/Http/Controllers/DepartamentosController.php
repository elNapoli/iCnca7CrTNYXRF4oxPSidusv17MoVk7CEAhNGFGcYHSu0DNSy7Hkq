<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departamento;
use App\Pais;
use App\Universidad;

class DepartamentosController extends Controller {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return view('departamentos.index');
	}

	public function getDepartamentos()
	{
		$departamentos = Departamento::with('campusSedeR')->get();
		$arra = array('data'=>$departamentos->toArray());
		return json_encode($arra);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$pais = Pais::lists('nombre','id');
		return view('departamentos.create',compact('pais'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore(Request $request)
	{
		dd('estoy en este metodo culiao de departamentos');
		 $this->validate($request, [
        'nombre' => 'required|string|unique:beneficio,nombre',
    	]);
		 
		$beneficio = Beneficio::create($request->all());
		$message    = 'El beneficio '.$request->get('nombre').'se almacenó correctamente';
		\Session::flash('message', $message);

		//return redirect()->route('beneficios.index');
		return redirect('beneficios');
	}

		public function postUniversidadByPais(Request $request){


	
		if($request->ajax()){
			return  Universidad::where('pais',$request->get('idBuscar'))->get()->toJson();

		}
		else
		{

			return "no ajax";
		}
	}

		public function postCampusSedeByUniversidad(Request $request){


	
		if($request->ajax()){
			return  CampusSede::where('universidad',$request->get('idBuscar'))->get()->toJson();

		}
		else
		{

			return "no ajax";
		}
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
		$beneficio = Beneficio::findOrFail($id);
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

		$beneficio = Beneficio::findOrFail($id);
		$beneficio->fill($request->all());
        $beneficio->save();
        \Session::flash('message', 'El Beneficio se Editó correctamente');
		return redirect('beneficios');
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
		$departamento = Departamento::findOrFail($request->get('id'));
 		$departamento->delete();
 		$message = ' El departamento '.$departamento->id.' Fue eliminado';
 	//	dd($request->all());
		return response()->json([
			'message'=> $message
			]);
	}

}