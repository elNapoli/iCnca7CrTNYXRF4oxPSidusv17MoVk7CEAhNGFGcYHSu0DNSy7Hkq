<?php namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ConfirmacionLlegadaController extends Controller {

	public function getIndex(Guard $auth){


		return view('confirmacionLlegada.index');
	}

}
