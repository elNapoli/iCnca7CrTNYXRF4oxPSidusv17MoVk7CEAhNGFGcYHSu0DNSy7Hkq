<?php namespace App\Http\Requests;

use App\Http\Requests\Request;


class CreateUniversidadRequest extends Request {

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
			'nombre_universidad' =>'required',
			'nombre' =>'required',
			'telefono'=>'required',
			'ciudad'=>'required',
			'direccion'=>'required',
			'pais'=>'required',
		];
	}
    public function messages()
    {

        return [
                //
                'nombre_universidad.required' => 'El nombre de la universidad es obligatorio',
            ];
    }
}
