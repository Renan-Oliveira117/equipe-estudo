<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\AlunoDataTable;
use App\Http\Requests\AlunoRequest;
use App\Models\Curso;
use App\Service\AlunoService;

class AlunoController extends Controller
{
    
    public function index(AlunoDataTable $alunoDataTable)
    {
        return $alunoDataTable->render('aluno.index');
    }

    
    public function create()
    {
        $curso = Curso::all()->pluck('nome', 'id');
        return view('aluno.form', compact('curso'));
    }

   
    public function store(Request $request)
    { 
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
        $retorno = AlunoService::getAlunoPorId($id);

        if($retorno ['status']){
            return view ('aluno.form', ['aluno' => $retorno['aluno'], 'curso' => $retorno ['curso'],
            
            ]);
        }
       return back()->withFalha('Ocorreu um erro ao selecionar o aluno');   
    }


    public function update(Request $request, $id)
    {
         $retorno = AlunoService::update($request->all(), $id);
         if ($retorno['status']){
             return redirect()->route('aluno.index');
         }   
         return back()->withInput();
    }

  
    public function destroy($id)
    {
        $retorno = AlunoService::destroy($id);
        if ($retorno['status']){
            return "Sucesso";
        }
        return abort(403,'Erro ao Excluir' .$retorno['erro']);
    }
}
