<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use App\DataTables\ProfessorDataTable;
use App\Service\ProfessorService;
use App\Http\Requests\ProfessorRequest;

class ProfessorController extends Controller
{
    public function index(ProfessorDataTable $professordatatable)
    {
        return $professordatatable->render('professor.index');
    }

    public function create()
    {
        return view('professor.create');
    }

    public function store(ProfessorRequest $request)
    {
        $retorno = ProfessorService::store($request->all());

        if ($retorno['status']) {
            return redirect()->route('professor.index');
        }
        
        return back()->withInput();
    }

    public function show(Professor $professor)
    {
        //
    }

    public function edit($id)
    {
        $retorno = ProfessorService::getProfessorPorId($id);
        if ($retorno['status']) {
            return view('professor.create', [
                'professor' => $retorno['professor'],
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $retorno = ProfessorService::update($request->all(), $id);
        if ($retorno['status']) {
            return redirect()->route('professor.index');
        }

        return back()->withInput();
    }

    public function destroy($id)
    {
        $retorno = ProfessorService::destroy($id);
        if ($retorno['status']) {
            return "Sucesso";
        }
        return abort(403, 'Erro ao Excuir ' .$retorno['erro']);
    }
}
