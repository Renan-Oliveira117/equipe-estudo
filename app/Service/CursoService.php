<?php

namespace App\Service;

use App\Models\Curso;
use App\Professor;
use Exception;

class CursoService
{
    public static function store($request)
    {
        try {
            return [
                'status' => true,
                'user' => Curso::create($request)
            ];
        } catch (Exception $erro) {
            return [
                'status' => false,
                'erro' => $erro->getMessage()
            ];
        }
    }

    public static function getCursoPorId($id)
    {
        try {
            $curso = Curso::findOrFail($id);
            $professor = Professor::all()->pluck('nome', 'id');
            return [
                'status' => true,
                'curso' => $curso,
                'professor' => $professor
            ];
        } catch (Exception $erro) {
            return [
                'status' => false,
                'erro' => $erro->getMessage()
            ];
        }
    }

    public static function update($request, $id)
    {
        try {
            $user = Curso::findOrFail($id);
            $user->update($request);
            return [
                'status' => true,
                'user' => $user
            ];
        } catch (Exception $erro) {
           return [
            'status' => false,
            'erro' => $erro->getMessage()
           ];
        }
    }

    public static function destroy($id)
    {
        try {
            $user = Curso::findOrFail($id);
            $user->delete();
            dd($user);
            return [
                'status' => true,
            ];
        } catch (Exception $erro) {
            return [
                'status' => false,
                'erro' => $erro->getMessage()
            ];
        }
    }
}