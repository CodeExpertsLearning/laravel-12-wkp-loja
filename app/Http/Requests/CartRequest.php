<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'cart.quantity' => 'integer|min:1',
            'cart.product' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'cart.quantity.min' => 'Quantidade Inválida!',
            'cart.product.required' => 'Escolha o produto para adicionar no carrinho!'
        ];
    }
}
