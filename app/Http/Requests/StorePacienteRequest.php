<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    
    // Normaliza antes de validar: 123.456.789-01 vira 12345678901
    protected function prepareForValidation(): void
    {
        $this->merge(['cpf' => preg_replace('/\D/', '', (string) $this->cpf)]);
    }

    public function rules(): array
    {
        return [
            'nome'     => ['required', 'string', 'max:255'],
            'cpf'      => ['required', 'digits:11', 'unique:pacientes,cpf'],
            'telefone' => ['nullable', 'string', 'max:20'],
            'email'    => ['nullable', 'email', 'max:255', 'unique:pacientes,email'],
        ];
    }

    
}



