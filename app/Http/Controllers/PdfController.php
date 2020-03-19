<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Professor;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function relatorio() {
        $alunos = Aluno::all();
            return \PDF::loadView('aluno.pdf', compact('alunos'))->stream();
    }
}
