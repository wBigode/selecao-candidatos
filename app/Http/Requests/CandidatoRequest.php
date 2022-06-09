<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidatoRequest extends FormRequest
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
            'nome'      => ['required', 'max:255', 'string'],
            'email'     => ['required_without:telefone', 'sometimes', 'nullable', 'max:100', 'email'],
            'telefone'  => ['required_without:email', 'sometimes', 'nullable', 'max:11', 'string'],
            'usuario'   => ['required', 'max:255', 'string'],
            'password'  => ['required', 'confirmed', 'max:255', 'string']
        ];
    }

    public function messages()
    {
        return [
            'nome.required'             => 'O campo Nome é obrigatório.',
            'email.required_without'    => 'O campo Email é obrigatório caso não preencha um telefone.',
            'telefone.required_without' => 'O campo Telefone é obrigatório caso não preencha um email.',
            'usuario.required'          => 'O campo Usuário é obrigatório.',
            'password.required'         => 'Os campos de senha são obrigatórios.',
            'password.confirmed'        => 'As senhas precisam ser iguais.'
        ];
    }
}
