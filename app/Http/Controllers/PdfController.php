<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Professor;
use App\Service\PdfService;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function index()
    {
        return view ('aluno.pdf', [
        'relatorioData' => PdfService::getRelatorioData()
    ]);
}

    public function pdf() 
    {        
        $pdf = Aluno::all();
            return \PDF::loadView('aluno.pdf', compact('alunos'))->stream();
    }
}
