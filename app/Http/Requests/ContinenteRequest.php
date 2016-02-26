<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContinenteRequest extends Request {

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

		$id = '';
		if($this->method() === 'PUT'){

			$id = $this->get('id');
		}
		return [
			'nombre' => 'required|unique:continente,nombre,'.$id,
		];
	}


    public function messages()
    {

        return [
                //
                'nombre.unique' => 'EL nombre ya ha sido ingresado.',
            ];
    }

}
