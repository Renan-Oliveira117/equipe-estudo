<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessorRequest extends FormRequest
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
                    'formacao' => 'required',
                    'date' => 'required'
                ];
            }
            case 'PUT':
            {
                return [
                    'nome' => 'required',
                    'formacao' => 'required',
                    'date' => 'required'
                ];
            }
        }
    }
}
