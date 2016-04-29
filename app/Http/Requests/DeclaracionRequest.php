<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class DeclaracionRequest extends Request {

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
			'fecha_matricula' =>'required',
			'persona_matricula'=>'required',
		];
	}

    public function messages()
    {

        return [
                //
                'fecha_matricula.required' => 'La fecha en la que lo matricularán es obligatoria.',
                'persona_matricula.required' => 'El nombre de la persona que matricula es obligatorio.',
            ];
    }
}
