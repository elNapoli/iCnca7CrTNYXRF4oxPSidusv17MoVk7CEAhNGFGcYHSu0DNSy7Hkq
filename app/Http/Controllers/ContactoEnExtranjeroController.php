<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContactoEnExtranjeroController extends Controller {

	
	public function getIndex(){

		return view('contactoExtranjero.index');
	}

}
