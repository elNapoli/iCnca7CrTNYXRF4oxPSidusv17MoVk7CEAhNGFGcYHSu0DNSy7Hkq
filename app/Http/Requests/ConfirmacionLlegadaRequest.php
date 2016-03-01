<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ConfirmacionLlegadaRequest extends Request {

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
			'fecha_inicio_curso' =>'required',
			'fecha_llegada' =>'required',
			'fecha_termino_curso'=>'required',
		];
	}
    public function messages()
    {

        return [
                //
                'fecha_inicio_curso.required' => 'La fecha de inicio de sus cursos es un campo obligatorio',
                'fecha_llegada.required' => 'La fecha de llegada al país de destino es un campo obligatorio',
                'fecha_termino_curso.required' => 'La fecha de finalización de sus cursos es un campo obligatorio',
            ];
    }

}
