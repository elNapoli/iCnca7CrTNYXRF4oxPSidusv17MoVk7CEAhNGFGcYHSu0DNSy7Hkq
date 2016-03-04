<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EstudioActualRequest extends Request {

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

		if($this->get('procedencia') === 'NO UACH'){

			return [
				'campus_sede'=>'required',
				'area'=>'required',
				'anios_cursados'=>'required',
			];
			
		}
		else{
			return [
				'carrera'=>'required',
				'anio_ingreso'=>'required',
				'ranking'=>'required',
				'beneficios'=>'required',
			];
			
		}
	}

    public function messages()
    {

        return [
                'area.required' => 'El área de estudio es un campo obligatorio.',
                'anio_ingreso.required' => 'El año de ingreso es obligatorio.',
                'anios_cursados.required' => 'El año en el que esta cursando es obligatorio.',

            ];
    }

}
