<?php

namespace Modules\Role\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Role\Entities\Role;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class RoleDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param  QueryBuilder  $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query) : EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query)
            {
                return '<a href="' . route(config('theme.rprefix') . '.edit', $query->id) . '" class="btn btn-primary-soft btn-sm me-1" title="Edit"><i class="fa fa-edit"></i></a>' .
                    '<a href="#" class="btn btn-danger-soft btn-sm" onclick="delete_modal(\'' . route(config('theme.rprefix') . '.destroy', $query->id) . '\',\'role-table\')"  title="Delete"><i class="fa fa-trash"></i></a>';
            })
            ->setRowId('id')
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param  Modules\Role\Entities\Role  $model
     */
    public function query(Role $model) : QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html() : HtmlBuilder
    {
        return $this->builder()
            ->setTableId('role-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row mb-3'<'col-md-4'l><'col-md-4 text-center'B><'col-md-4'f>>rt<'bottom'<'row'<'col-md-6'i><'col-md-6'p>>><'clear'>")
            ->orderBy(3)
            ->parameters([
                'responsive' => true,
                'autoWidth'  => false,
            ])
            ->buttons([
                Button::make('reset')->className('btn btn-success box-shadow--4dp btn-sm-menu'),
                Button::make('reload')->className('btn btn-success box-shadow--4dp btn-sm-menu'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns() : array
    {
        return [
            Column::make('DT_RowIndex')->title(__('SI'))->searchable(false)->orderable(false)->width(30)->addClass('text-center'),
            Column::make('name')->title(__('Name'))->defaultContent('N/A'),
            Column::make('guard_name')->title(__('Guard'))->defaultContent('N/A'),
            Column::make('created_at')->title(__('Created'))->defaultContent('N/A'),
            Column::make('updated_at')->title(__('Updated'))->defaultContent('N/A'),
            Column::computed('action')
                ->title(__('Action'))
                ->exportable(false)
                ->printable(false)
                ->width(80)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     */
    protected function filename() : string
    {
        return 'Role_' . date('YmdHis');
    }
}