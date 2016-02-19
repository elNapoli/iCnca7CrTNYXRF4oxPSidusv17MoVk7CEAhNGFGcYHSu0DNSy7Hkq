<?php namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests\RepressentanteRequest;
use App\Http\Requests;
use App\Postulante;
use App\PreUResponsable;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class RepresentanteUachController extends Controller {

	//
	public function getIndex(){

		return view('representanteUach.index');
	}

	public function getRepresentanteByUser(Guard $auth){

		$postulante = Postulante::where('user_id',$auth->id())->first();
		$responsable = PreUResponsable::where('postulante',$postulante->id)->get();
		
		$arra = array('data'=>$responsable->toArray());
		//dd(json_encode($arra));
		return json_encode($arra);

	}

	public function postStore(RepressentanteRequest $request){

		$representanteUach = PreUResponsable::create($request->all());
		return response()->json([
						'message'=> 'se Guardó el representante Correctamente.'
						]);
//		dd('entre');
	}
}
