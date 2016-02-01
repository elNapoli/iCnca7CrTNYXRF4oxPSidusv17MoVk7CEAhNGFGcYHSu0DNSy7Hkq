<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CretePostulacionRequest extends Request {

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
			'apellido_paterno' =>'required',
			'apellido_materno'=>'required',
			'nombre'=>'required',
			'direccion'=>'required',
			'email_personal'=>'required|unique:postulante,email_personal',
			'fecha_nacimiento'=>'required',
			'lugar_nacimiento'=>'required',
			'nacionalidad'=>'required',
			'ciudad'=>'required',
			'sexo'=>'required',
			'telefono'=>'required',
			'tipo'=>'required',
			'numero'=>'required|unique:documento_identidad,numero',
		];
	}
    //funcion donde se definen los distintos mensajes del sistema
    public function messages()
    {

        return [
                //
                'email_personal.unique' => 'Ya existe un postulante con ese mail.',
                'numero.unique' => 'Ya existe un postulante registrado con el número de documento.'
            ];
    }
}
