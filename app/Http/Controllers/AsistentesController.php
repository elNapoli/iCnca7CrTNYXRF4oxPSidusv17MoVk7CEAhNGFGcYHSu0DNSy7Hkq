<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Asistente;
use App\PreUach;
use App\Postulante;
use App\Ciudad;
use App\Beneficio;
use App\DetalleBeneficio;

class AsistentesController extends Controller {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function getPrueba()
	{
//		$var = Postulante::with('pregradosR.preUachsR.asistentesR.detalleBeneficioR.beneficioR')->has('pregradosR.preUachsR.asistentesR.detalleBeneficioR.beneficioR')->get();
		//$var = Postulante::with('pregradosR')->get();
//		$arra = array('data'=>$var->toArray());
//		return $var->toJson();
		//return json_encode($arra);
		return view('asistentes.prueba');
	}

	public function getIndex()
	{

		$asistentes = Postulante::with('pregradosR.preUachsR.asistentesR.detalleBeneficioR.beneficioR')->has('pregradosR.preUachsR.asistentesR')->get();
		return view('asistentes.index', compact('asistentes'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		$post = Postulante::has('pregradosR.preUachsR')->whereNotIn('postulante.id',function($query){
			$query->select('postulante.id')
                ->from('postulante')
		->join('asistente','asistente.postulante','=','postulante.id')
                /*->where('postulante.id', '=', '4')*/;})->get();
		//$post_a = Postulante::has('pregradosR.preUachsR.asistentesR')->get();	
		$post = array_pluck($post,'nombre','id'); //genera una lista para el select del arreglo de postulantes filtrados
		return view('asistentes.create',compact('post'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore(Request $request)
	{
		$beneficios = Beneficio::lists('nombre','id');
		$this->validate($request, [
        'nombre' => 'required|string|unique:beneficio,nombre',
        'postulante' =>'required',
        'indicaciones' => 'required',
    	]);

		$asistente = Asistente::create($request->all());
		$message    = 'El registro '.$request->get('nombre').' se almacenó correctamente';
		\Session::flash('message', $message);

		//return redirect()->route('beneficios.index');
		return view('asistentes/createb',compact('beneficios','asistente'));
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
		$asistentes = Asistente::findOrFail($id);
		$post = Postulante::findOrFail($asistentes->postulante);
		//dd($asistentes->toArray());
		$detalle = DetalleBeneficio::where('id_a','=',$asistentes->id)->get();
		$beneficios = Beneficio::lists('nombre','id');
        return view('asistentes.edit',compact('asistentes','detalle','post','beneficios'));
	}
	public function getDetalle($id)
	{
		$detalle = DetalleBeneficio::with('beneficioR')->where('id_a','=',$id)->get();
		
		$arra = array('data'=>$detalle->toArray());
		//dd(json_encode($arra));
		return json_encode($arra);
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function putUpdate($id,Request $request)
	{
		/*$this->validate($request, [
        'nombre' => 'required|string|unique:asistente,nombre,'.$id,
    	]);*/ // el nombre del asistente no se edita. no es operable ni estadistico 
		$asistentes = Asistente::findOrFail($id);
		$asistentes->fill($request->all());
        $asistentes->save();
        \Session::flash('message', 'El registro se editó correctamente');
		return redirect('asistentes');
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

	public function deleteBenef($id,Request $request)
	{
		//abort(500);
		$beneficio = DetalleBeneficio::findOrFail($id);
 		$beneficio->delete();
 		$message = ' El beneficio '.$beneficio->beneficio.' Fue eliminado';
 	//	dd($request->all());
		if($request->ajax()){
		//	return($message);
			return response()->json([
				'message'=> $message
				]);
		}
		
		
		\Session::flash('message', $message);

		return redirect('beneficios');
	}

}