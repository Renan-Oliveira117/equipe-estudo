<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Service\UserService;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(UserRequest $request)
    {
        $user = UserService::store($request->all());

        if ($user['status']) {
            return redirect()->route('usuario.index');
        }

        return back()->withInput();
    }

    public function edit($id)
    {
        $user = UserService::getUserPorId($id);

        if ($user['status']) {
            return view('user.create', [
                'user' => $user['user']
            ]);
        }

        return back()->withInput();
    }

    public function update(UserRequest $request, $id)
    {
        $user = UserService::update($request->all(), $id);
        if ($user['status']) {
            return redirect()->route('usuario.index');
        }

        return back()->withInput();
    }

    public function destroy($id)
    {
        $user = UserService::destroy($id);

        if ($user['status']) {
            return 'Usuário excluído com sucesso';
        }

        abort(403, 'Erro ao excluir, ' . $user['erro']);
    }
}