<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Asignatura;
use App\Postulante;
use App\Universidad;
use App\CampusSede;
use App\Facultad;
use App\Carrera;
use App\User;
use App\Convenio;

class DocumentosPostulacionController extends Controller {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function getPrueba(Guard $auth)
	{
		$post = Postulante::where('user_id',$auth->id())->get(); //objeto post con informacion extra
		$postulante = Postulante::findOrFail($post[0]->id); //individualizo al postulante

		dd($postulante->pregradosR->preUachsR->preURespnsablesR);


}
	public function getIndex(Guard $auth)
	{
		if(!$auth->id())
		{
			dd('No esta logeado');
		}
		else{return view('documentospostulacion.index');}

	}

}