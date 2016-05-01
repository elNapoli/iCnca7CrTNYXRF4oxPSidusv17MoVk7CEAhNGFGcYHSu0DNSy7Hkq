<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CiudadRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return  true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		if($this->method() === 'PUT'){
		return [
					'continente' =>'required',
					'pais'=>'required',
					'nombre'=>'required',
					'codigo_postal'=>'required|unique:ciudad,codigo_postal,'.$this->get('id_ciudad'),

				];

		}
		return [
			'continente' =>'required',
			'pais'=>'required',
			'nombre'=>'required',
			'codigo_postal'=>'required|unique:ciudad,codigo_postal',
		];
	}

}
