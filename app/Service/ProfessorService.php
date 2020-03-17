<?php

namespace App\Service;

use App\Models\Professor;
use Exception;

class ProfessorService
{
    public static function store($request)
    {
        try {
            return [
                'status' => true,
                'user' => Professor::create($request)
            ];
        } catch (Exception $erro) {
            return [
                'status' => false,
                'erro' => $erro->getMessage()
            ];
        }
    }

    public static function getProfessorPorId($id)
    {
        try {
            $user = Professor::findOrFail($id);
            return [
                'status' => true,
                'professor' => $user
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
            $user = Professor::findOrFail($id);
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
            $user = Professor::findOrFail($id);
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