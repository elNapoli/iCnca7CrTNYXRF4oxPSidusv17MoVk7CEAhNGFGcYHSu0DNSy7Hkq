<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PaisesRequest extends Request {

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
			'nombre' => 'required|unique:pais,nombre,'.$id,
			'continente' => 'required',
		];
	}


    public function messages()
    {

        return [

            ];
    }

}
