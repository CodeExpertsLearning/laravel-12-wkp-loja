<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', Rules\Password::defaults()],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo é obrigatório',
            'min'      => 'Sua descrição deve ter pelo menos :min caracteres',
            'email'    => 'Digite um e-mail válido'
        ];
    }
}
