<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CursosHomologadosRequest extends Request {

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
			'codigo_1' =>'required',
			'codigo_2'=>'required',
			'nombre_asignatura_2'=>'required',
			'pga'=>'required',
		];
	}

    public function messages()
    {

        return [
                //
                'codigo_1.required' => 'El código de la asignatura de la universidad de origen es obligatorio',
                'codigo_2.required' => 'El código de la asignatura de la universidad de destino es obligatorio',
                'nombre_asignatura_2.required' => 'El nombre de la asignatura de la universidad de destino es obligatorio',

            ];
    }

}
