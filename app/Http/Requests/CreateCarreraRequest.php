<?php namespace App\Http\Requests;
use Illuminate\Routing\Route;

use App\Http\Requests\Request;

class CreateCarreraRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function __construct(Route $route){

		$this->route = $route;

	}
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

	 	switch($this->method()){

	 		case 'PUT':{

	 			return [
					'facultad' =>'required',
					'nombre'=>'required',
					'director'=>'required',
					'email'=>'required|unique:carrera,email,'.$this->id,
				];
	 		}

	 		case'POST':{
		 		return [
					'facultad' =>'required',
					'nombre'=>'required',
					'director'=>'required',
					'email'=>'required|unique:carrera,email',
				];
	 		}
	 		default:break;

	 	}
		
	}

}
