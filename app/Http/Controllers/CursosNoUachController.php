<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Postulante;
use Illuminate\Http\Request;
class CursosNoUachController extends Controller {

	//

	public function getIndex(){


		$postulante = Postulante::first();

		return view('cursosNoUach.index');
	}
}
