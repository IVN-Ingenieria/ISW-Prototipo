<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class Crear extends Request {

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
			'nombre'		=>	'required',
			'apellido_p'	=>	'required',
			'apellido_m'	=>	'required',
			'rut'			=>	'required|min:9',
			'email'			=>	'required|E-mail',
			'direccion'		=>	'required',
			'telefono'		=>	'required|min:8',
			'cargo'			=>	'required'
		];
	}

}
