<?php

namespace App\Service;

use App\Models\Aluno;
use App\Models\Curso;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class AlunoService
{
    public static function store($request)
    {
        try {
            DB::beginTransaction();

            $aluno = Aluno::create(Arr::except($request,['alunos','imagem_temp']));

            $aluno->update([
                'imagem' => self::uploadImagem($aluno, $request['imagem_temp'])
            ]);
            DB::commit();
            return [
                'status' => true,
                'aluno' => $aluno
            ];
        } catch (Exception $err) {
            dd($err->getMessage());
            DB::rollBack();
            return [
                'status' => false,
                'erro' => $err->getMessage()
            ];
        }
    }

    public static function getAlunoPorId($id)
    {
         try{
             $aluno = Aluno::findOrFail($id);
             $curso  = Curso::all()->pluck('nome','id');
             return[
                 'status' => true,
                 'aluno' => $aluno, 
                 'curso' => $curso
             ];
         }catch(Exception $err)
         {
             return [
                 'status' => false,
                 'erro' => $err->getMessage()
             ];
         }        
    }

    public static function update($request, $id)
    {
        try {
            DB::beginTransaction();
            $aluno = Aluno::findOrFail($id);
            $aluno->update(Arr::except($request, ['cursos', 'imagem_temp']));

            if (isset($request['imagem_temp'])) {
                $aluno->update([
                    'imagem' => self::uploadImagem($aluno, $request['imagem_temp'])
                ]);
            }

            DB::commit();
            return [
                'status' => true,
                'aluno' => $aluno
            ];
        } catch(Exception $err) {
            DB::rollBack();
            dd($err->getMessage());
            return [
                'status' => false,
                'erro' => $err->getMessage()
            ];
        }
    }

    public static function destroy($id)
    {
        try{
            $aluno = Aluno::finsOrFail($id);
            $aluno->curso()->detach();
            $aluno->delete();
            return[
                'status' => true,
            ];
        }catch (Exception $err){
            return [
                'status' => false,
                'erro' => $err->getMessage()
            ];
        }
    }



    public static function uploadImagem($aluno, $arquivo)
    {
        $imagem =  $aluno->id . time() . "." . $arquivo->getClientOriginalExtension();
        $arquivo->move(public_path() . '/imagens/', $imagem);

        return $imagem;
        
    }
}