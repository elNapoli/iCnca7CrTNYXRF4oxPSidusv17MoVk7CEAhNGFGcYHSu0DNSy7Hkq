<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Asignatura;
use App\Universidad;

class AsignaturasController extends Controller {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return view('asignaturas.index');
	}

	public function getAsignaturas()
	{
		$asignaturas = Asignatura::with('carreraR.facultadR.campusSedeR.universidadR')->get();
		$arra = array('data'=>$asignaturas->toArray());
		return json_encode($arra);
	}

	public function getCreate()
	{
		$universidad = Universidad::lists('nombre','id');
		return view('asignaturas.create',compact('universidad'));
	}
}