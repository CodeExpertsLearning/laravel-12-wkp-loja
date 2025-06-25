<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => ['required'],
            'description' => 'nullable|min:15',
            'body' => 'required',
            'price' => 'required',
            'in_stock' => 'required|integer|min:10',
            'status' => 'required',
            'photos.*' => 'nullable|image',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Este campo é obrigatório!',
            'min' => 'Este campo deve ter no mínimo :min',
            'image' => 'Imagem inválida encontrada!'
        ];
    }
}
