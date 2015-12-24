<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CrearUsuarioRequest extends Request {

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
			'nombre' => 'required|min:3',
			'apellido_p' => 'required|min:1',
			'apellido_m'=> 'required|min:1',
			'email'=> 'required',
		];
	}

}
