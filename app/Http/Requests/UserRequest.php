<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
{
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
            'password_actual'=>'required|current_password'
        ];
    }
    public function messages()
    {

        return [
                //
            'password_actual.current_password' => 'La Clave ingresada no es válida, porfavor intente nuevamente.',
            'password_actual.required' => 'Para que se efectuen los cambios debe ingresar su contraseña acutal.',
        ];
    }
}
