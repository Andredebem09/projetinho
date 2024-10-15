<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validadeSupportRequest extends FormRequest
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
       return ([
        'nome_pessoa' => 'required|min:3|max:50', #colocar exclusividade-->|unique:forums
        'duvida' => 'required|min:3|max:150',
        'detalhe' => 'required|min:3|max:1000',
        'imagem' => 'nullable|image|max:2048'
    ]);
    
        
    }
}
