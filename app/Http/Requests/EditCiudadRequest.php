<?php namespace App\Http\Requests;

use Illuminate\Routing\Route;
use App\Http\Requests\Request;

class EditCiudadRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function __construct(Route $route){

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
		//dd($this->route->getParameter('one'));

		return [
			'continente' =>'required',
			'pais'=>'required',
			'nombre'=>'required',
			'codigo_postal'=>'required|alpha_num|unique:ciudad,codigo_postal,'.$this->route->getParameter('one'),
		];
	}

}
