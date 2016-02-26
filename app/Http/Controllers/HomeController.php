<?php namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\Guard;
use App\Postulante;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return view('home');
	}
	public function postValidarEntradaContactoExtranjero(Guard $auth){
		$postulante = Postulante::where('user_id',$auth->id());
		$codigo =  $postulante->first()->documentoIdentidadR()->where('tipo', 'p')->get()->count();
		$mensaje = 'Usted no ha ingresado su pasaporte, porfavor dirijase a postulación, una ves realizada esta acción podrá acceder a este apartado';
		if($codigo != 0){

			$codigo = $postulante->first()->pregradosR->preUachsR->preURespnsablesR()->where('tipo','contacto')->get()->count();
			$mensaje = 'Usted no ha ingresado un contacto en Chile, porfavor dirijase a representante, una ves realizada esta acción podrá acceder a este apartado';

		}
		return response()->json([
				'codigo'=> $codigo,
				'message'=> $mensaje
				]);

	}

	public function postGenerarMenus(Guard $auth){


	
		$parametros = array(
							'codigo_error'    =>'0',
							'tipo_estudio'	  => '',
							'procedencia'	  => ''				   
						);
		$postulante = Postulante::where('user_id',$auth->id())->first();

		if($postulante){
			$parametros['codigo_error'] = 1;
			$parametros['tipo_estudio'] = $postulante->tipo_estudio;
			
			if($postulante->tipo_estudio ==='Pregrado'){

				//verificar si el postulante es de la UACh o no.
				if($postulante->pregradosR->procedencia ==='UACH'){

					$parametros['procedencia'] = $postulante->pregradosR->procedencia;

				}
				else{

					$parametros['procedencia'] = 'NO UACH';

				}

			}

			else{



			}
		}
		return json_encode($parametros);
	}

}
