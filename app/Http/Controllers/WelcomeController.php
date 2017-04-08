<?php namespace App\Http\Controllers;

use App\Noticia;
use App\Funciones\CvsToArray;
use Illuminate\Http\Request;

use App\Continente;
use App\Pais;



class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		\App::setLocale(session('lang'));

		$noticias = Noticia::where('carousel','si')->get();
		return view('welcome.index',compact('noticias'));
	}
	public function setLang(Request $request){
		\Session::set('lang', $request->get('lang'));
		return redirect('/');


	}

}
