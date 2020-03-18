<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\AlunoDataTable;
use App\Http\Requests\AlunoRequest;
use App\Models\Curso;
use App\Service\AlunoService;

class AlunoController extends Controller
{
    
    public function index(AlunoDataTAble $alunoDataTAble)
    {
        return $alunoDataTAble->render('aluno.index');
    }

    
    public function create()
    {
        $curso = Curso::all()->pluck('nome', 'id');
        return view('aluno.form', compact('curso'));
    }

   
    public function store(AlunoRequest $request)
    { dd($request);
        $aluno = AlunoService::store($request->all());
           
        if ($aluno['status']){
          return redirect()->route('aluno.index')
                      ->withSucesso('Usuário salvo com sucesso');
        }

        return back()->withInput()
                ->withFalha('Ocorreu um erro ao salvar');
        
    }

 
    public function show($id)
    {
        
    }

 
    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

  
    public function destroy($id)
    {
        
    }
}
