<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;

class RegistroRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                PasswordRules::min(8)->letters()->symbols()->numbers()
            ]
        ];
    }

    /**
     * Get custom error messages for validation.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name' => 'El Nombre es obligatorio.',
            'email.required' => 'El Email es obligatorio.',
            'email.email' => 'El Email debe tener un formato válido.',
            'email.unique' => 'Este Email ya está registrado.',
            'password.confirmed' => 'La contraseña no coinciden.',
            'password' => 'El password debe contener al menos 8 caracteres, un simbolo y un número',
            

        ];
    }
}
