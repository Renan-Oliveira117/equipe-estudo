<?php

namespace App\Service;

use App\Models\Aluno;
use App\Models\Curso;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AlunoService
{
    public static function store($request)
    {
        try {
            DB::beginTransaction();

            $aluno = Aluno::create(Arr::except($request,['cursos','imagem_temp']));

            $aluno->update([
                'imagem' => self::uploadImagem($aluno, $request['imagem_temp'])
            ]);

            DB::commit();
            return [
                'status' => true,
                'aluno' => $aluno
            ];
            
        } catch (Exception $err) {
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
             return[
                 'status' => true,
                 'aluno' => $aluno
             ];
         }catch(Exception $err) {
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

            if ($request['imagem_temp']) {
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
            return [
                'status' => false,
                'erro' => $err->getMessage()
            ];
        }
    }

    public static function destroy($id)
    {
        try{
            $aluno = Aluno::findOrFail($id);
            $aluno->delete();
            return[
                'status' => true
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