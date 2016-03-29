<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EstadisticasController extends Controller {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$valores = array('state'=> 2,'freq' => array('low' => 1, 'mid' => 2, 'high' => 3, 'avg' => 12));
		$indices = json_encode(array('low','mid','high','avg'));
		$val_json = json_encode($valores);
		return view('estadisticas.index',compact('val_json','indices'));
	}


}