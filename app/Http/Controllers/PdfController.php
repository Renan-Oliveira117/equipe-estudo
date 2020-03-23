<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Professor;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PdfController extends Controller
{
    public function index(){

        $relatorioData=$this->getRelatorioData();
        return view('aluno.pdf')->with('relatorioData',$relatorioData);

    }

    public function getRelatorioData(){

        $relatorioData=DB::table('alunos')
        ->select('alunos.nome as aluno_nome', 'cursos.nome as curso_nome', 'professors.nome as professor_nome')
        ->join('cursos', 'alunos.curso_id', '=', 'cursos.id')
        ->join('professors', 'cursos.professor_id', '=', 'professors.id')
        ->get();

        return  $relatorioData;
    } 

    public function pdf() {
        
        $pdf = Aluno::all();
            return \PDF::loadView('aluno.pdf', compact('alunos'))->stream();
    }
}
