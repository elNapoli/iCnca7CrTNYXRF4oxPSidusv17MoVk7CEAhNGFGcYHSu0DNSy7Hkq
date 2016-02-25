<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactoExtranjeroRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
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
		return [
			'conocido_extranjero' =>'required',
			'direccion'=>'required',
			'direccion_hospital'=>'required',
			'nombre_seguro'=>'required',
			'numero_seguro'=>'required',
			'telefono_1'=>'required',
			'validez_seguro'=>'required',
		];
	}

}
