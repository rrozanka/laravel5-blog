<?php

namespace App\Http\Requests;

/**
 * Class PermissionRequest
 *
 * @package App\Http\Requests
 */
class PermissionRequest extends Request {

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
		return $rules = [
			'name' => 'required'
		];
	}

}
