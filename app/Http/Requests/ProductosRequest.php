<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductosRequest extends FormRequest
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
        'nombre' => 'required',
        'precio' => 'required|float',
        'impuesto' => 'required|float',
    ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El :attribute es obligatorio.',
            'precio.required' => 'El :attribute es obligatorio.',
            'impuesto.required' => 'El :attribute es obligatorio.',
            'impuesto.float' => 'El :attribute debe ser un valor numerico',
            'precio.float' => 'El :attribute debe ser un valor numerico'

        ];
    }    
}
