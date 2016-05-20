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
		if($this->get('financiamiento')==='4' or $this->get('financiamiento')==='5'){

		$descripcion = 'required';
		}


		if($this->get('tipo_estudio') === 'Pregrado'){


			return [
				'anio'=>'required',
				'semestre'=>'required',
				'financiamiento'=>'required',
				'descripcion'=> $descripcion,
				'carrera'=>'required',
			];
		}

		else{

			return [
				'anio'=>'required',
				'semestre'=>'required',
				'financiamiento'=>'required',
				'descripcion'=> $descripcion,
				'nombreP'=>'required',
				'programa'=>'required',
				'instituto'=>'required',
				'facultad'=>'required',
			];

		}
	}



    public function messages()
    {

        return [
                //
                'anio.required' => 'El campo año es obligatorio.',
                'nombreP.required' => 'El nombre del programa es un campo obligatorio.',
                'programa.required' => 'El tipo de programa es un campo obligatorio.',
            ];
    }
}
