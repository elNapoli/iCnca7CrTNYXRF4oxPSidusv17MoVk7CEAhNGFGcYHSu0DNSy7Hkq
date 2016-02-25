<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;


class EditUniversidadRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	private $nombre_universidad = "hola";
	public function __construct(Route $route){
		//$json =json_decode($this->get('infoUniversidad'))[0];
		//$this->nombre_universidad = $json->nombre_universidad;
		//dd($json->nombre_universidad);
		$this->route = $route;


	}

	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		/*$json =json_decode($this->get('infoUniversidad'))[0];
		//dd($json->nombre_universidad);


		return [
			$this->nombre_universidad =>'required',
			'nombre' =>'required',
			'telefono'=>'required',
			'sitio_web'=>'active_url',
			'ciudad'=>'required',
		];*/
	}

}
