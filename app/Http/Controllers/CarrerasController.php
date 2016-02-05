<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Carrera;

use Illuminate\Http\Request;

class CarrerasController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function postCarrerasByFacultad(Request $request){


	
		if($request->ajax()){
			return  Carrera::where('facultad',$request->get('idBuscar'))->get()->toJson();

		}
		else
		{

			return "no ajax";
		}
	}

}
