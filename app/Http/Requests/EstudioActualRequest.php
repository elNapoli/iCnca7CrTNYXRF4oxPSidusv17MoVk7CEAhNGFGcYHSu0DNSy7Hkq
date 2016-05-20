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

		if($this->get('tipo_estudio') === 'Pregrado')
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


		else{


			return[
			'campus_sede' => 'required',
			'programa'=> 'required',
			'nombreP' => 'required',
			'nombreD' => 'required',
			'nombreS' => 'required',
			'telefonoS' => 'required',
			'area' => 'required',
			'emailD' => 'required'



			];
		}
	}

    public function messages()
    {

        return [
                'area.required' => 'El área de estudio es un campo obligatorio.',
                'anio_ingreso.required' => 'El año de ingreso es obligatorio.',
                'anios_cursados.required' => 'El año en el que esta cursando es obligatorio.',
                'campus_sede.required' => "La Universidad es un campo obligatorio",
                'programa.required' =>  "EL tipo del programa actual es un campo obligatorio",
                'nombreP.required' => "El nombre del programa actual es un campo obligatorio",
                'nombreD.required' => "El nombre del director o tutor es un campo obligatorio",
                'nombreS.required' => "El nombre de la secretaria es un campo obligatorio",
                'telefonoS.required' => "El teléfono de la secretaria es un campo obligatorio",
                'area.required' => "El área de su programa  es un campo obligatorio",
                'emailD.required' => "El email del director es un campo obligatorio."

            ];
    }

}
