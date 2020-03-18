<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'nome' => 'required',
                    'cpf' => 'required',
                    'data_nascimento' => 'required',
                    'cep' => 'required',
                    'logradouro' => 'required',
                    'numero' => 'required',
                    'bairro' => 'required',
                    'cidade' => 'required',
                    'estado' => 'required',
                    'curso_id' => 'required',
                ];
            }
            case 'PUT':
            {
                return [
                    'nome' => 'required',
                    'cpf' => 'required',
                    'date_nascimento' => 'required',
                    'cep' => 'required',
                    'logradouro' => 'required',
                    'numero' => 'required',
                    'bairro' => 'required',
                    'cidade' => 'required',
                    'estado' => 'required',
                    'curso_id' => 'required',                    
                ];
            }
        }
    
    }
}
