<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PrePostulacionUniversidadRequest extends Request {

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
		$descripcion = '';
		if($this->get('financiamiento')==='4' or $this->get('financiamiento')==='3'){

		$descripcion = 'required';
		}
		return [
			'anio'=>'required',
			'semestre'=>'required',
			'financiamiento'=>'required',
			'descripcion'=> $descripcion,
			'carrera'=>'required',
		];
	}


}
