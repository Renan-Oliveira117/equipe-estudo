<?php

namespace App\Service;

use App\Models\Aluno;
use Exception;

class AlunoService
{
    public static function store($request)
    {
        try {
            $aluno = Aluno::create($request);
            return [
                'status' => true,
                'aluno' => $aluno
            ];
        } catch (Exception $err) {
            dd($err->getMessage());
            return [
                'status' => false,
                'erro' => $err->getMessage()
            ];
        }
    }
}