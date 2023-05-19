<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'token'                 => 'required',
			'email'                 => 'required|email',
			'password'              => 'required|confirmed|min:3',
			'password_confirmation' => 'required',
		];
	}
}
