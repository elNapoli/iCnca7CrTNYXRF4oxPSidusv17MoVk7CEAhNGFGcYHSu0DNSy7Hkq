<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class DocumentoIdentidadRequest extends Request {

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
			'numero' =>'required',
			'tipo'=>'required',
		];
	}

    public function messages()
    {

        return [
                //
                'numero.required' => 'El número del documento es un campo obligatorio',
                'tipo.required' => 'El tipo de documento es un campo obligatorio',
            ];
    }

}
