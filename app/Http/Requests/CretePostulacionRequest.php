<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Postulante;
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

	
		$postulante = Postulante::where('user_id',\Auth::id())->first();
		$email_personal = "";
		$email_institucional = "";
		$titulo_profesional = "";
		if($postulante){
			//dd('existe');
			$email_personal = ",".$postulante->id;
			$email_institucional = ",".$postulante->id.',postulante';


		}
		if( $this->get('tipo_estudio')==='Postgrado'){

			$titulo_profesional = 'required';
		}

		if($this->get('procedencia')==='UACH' and $this->get('tipo_estudio')==='Pregrado'){

			return [
				'apellido_paterno' =>'required',
				'apellido_materno'=>'required',
				'nombre'=>'required',
				'tipo'=>'required',
				'numero'=>'required',
				'fecha_nacimiento'=>'required',
				'sexo'=>'required',
				'email_personal'=>'required|unique:postulante,email_personal'.$email_personal,
				'telefono'=>'required',
				'ciudad'=>'required',
				'direccion'=>'required',
				'nacionalidad'=>'required',
				'lugar_nacimiento'=>'required',
				'titulo_profesional'=> $titulo_profesional,
				'tipo_estudio'=>'required',
				'procedencia'=>'required',
				'email_institucional'=>'required|unique:pre_uach,email_institucional'.$email_institucional,
				'grupo_sanguineo'=>'required',
		
				'telefono_2'=>'required',
				'ciudad_2'=>'required',
				'direccion_2'=>'required',

			];
		}
		else{

			return [
				'apellido_paterno' =>'required',
				'apellido_materno'=>'required',
				'nombre'=>'required',
				'tipo'=>'required',
				'numero'=>'required',
				'fecha_nacimiento'=>'required',
				'sexo'=>'required',
				'email_personal'=>'required|unique:postulante,email_personal'.$email_personal,
				'telefono'=>'required',
				'ciudad'=>'required',
				'direccion'=>'required',
				'nacionalidad'=>'required',
				'lugar_nacimiento'=>'required',
				'titulo_profesional'=> $titulo_profesional,
				'tipo_estudio'=>'required',
				'procedencia'=>'required',

			];
		}
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
