<?php

namespace App\DataTables;

use App\Models\Professor;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Collective\Html\FormFacade;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class ProfessorDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function($professor) {
                $acoes = link_to(
                    route('professor.edit', $professor),
                    'Editar',
                    ['class' => 'btn btn-sm btn-primary']
                );
                $acoes .= FormFacade::button(
                    'Excluir',
                    [
                        'class' => 'btn btn-sm btn-danger',
                        'onclick' => "excluir('" .route('professor.destroy', $professor) ."')"
                    ]
                );    
                return $acoes;
            })
            ->editColumn('date', function ($professor){
                return date('d/m/Y', strtotime($professor->date));
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\ProfessorDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Professor $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('professor-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')->text('Adicionar Professor'),
                        Button::make('export')->text('Exportar'),
                        Button::make('print')->text('Imprimir')
                    )
                    ->parameters([
                        'language' => ['url' => '//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json']
                    ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('nome'),
            Column::make('formacao'),
            Column::make('date')->title('Data Nascimento'),
            Column::computed('action')
                  ->exportable(false)
                  ->title('Ações')
                  ->printable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Professor_' . date('YmdHis');
    }
}
