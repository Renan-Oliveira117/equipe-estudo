<?php

namespace App\DataTables;

use App\Models\Aluno;
use Collective\Html\FormFacade;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class AlunoDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function($aluno){
                $acoes = link_to(
                    route('aluno.edit' , $aluno),
                    'Editar',
                    ['class' => 'btn btn-sm btn-primary']
                );
                $acoes .= FormFacade::button(
                    "Excluir",
                    ['class' => 
                        'btn btn-sm btn-danger ml-1',
                        'onclick' =>"excluir('" . route('aluno.destroy', $aluno) ."')"
                        ]
                );
                return $acoes;

            })
            ->editColumn('imagem', function ($aluno) {
                return '<img style="height: 50px;" src="' . asset('imagens/' . $aluno->imagem) . '" />';
            })
            ->rawColumns(['action', 'imagem']);
    }

  
    public function query(Aluno $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
                    ->setTableId('aluno-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')->text('Novo Aluno'),
                        Button::make('export'),
                        Button::make('print')->text('imprimir')
                    );
    }

    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false),
            Column::make('id'),
            Column::make('nome'),
            Column::make('cpf'),
            Column::make('data_nascimento'),
            Column::make('imagem'),
            Column::make('curso_id'),
            Column::make('created_at'),
            
        ];
    }

    protected function filename()
    {
        return 'Aluno_' . date('YmdHis');
    }
}
