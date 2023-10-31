<?php

namespace Modules\Expert\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Expert\Entities\DocType;
use Modules\Expert\Entities\ExpertPaymentSetup;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ExpertPaymentSetupDataTable extends DataTable
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
                return '<a href="#" class="btn btn-primary-soft btn-sm me-1" onclick="showEditModal(' . $query->id . ')" title="Edit"><i class="fa fa-edit"></i></a>' .
                    '<a href="#" class="btn btn-danger-soft btn-sm" onclick="delete_modal(\'' . route(config('theme.rprefix') . '.destroy', $query->id) . '\',\'expert-table\')"  title="Delete"><i class="fa fa-trash"></i></a>';
            })
            // expert_id
            ->editColumn('expert_id', function ($query)
            {
                return $query->expert?->full_name;
            })

            ->editColumn('created_by', function ($query)
            {
                return $query->creator?->name;
            })

            // created_at date format change
            ->editColumn('created_at', function ($query)
            {
                return date('d-m-Y', strtotime($query->created_at));
            })

            ->setRowId('id')
            ->addIndexColumn()
            ->rawColumns(['action', 'expert_id']);
    }

    /**
     * Get query source of dataTable.
     */
    public function query(ExpertPaymentSetup $model) : QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html() : HtmlBuilder
    {
        return $this->builder()
            ->setTableId('expert-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row mb-3'<'col-md-4'l><'col-md-4 text-center'B><'col-md-4'f>>rt<'bottom'<'row'<'col-md-6'i><'col-md-6'p>>><'clear'>")
            ->orderBy(3)
            // ->selectStyleSingle()
            ->buttons([
                Button::make('excel')->className('btn btn-success box-shadow--4dp btn-sm-menu'),
                Button::make('csv')->className('btn btn-success box-shadow--4dp btn-sm-menu'),
                Button::make('pdf')->className('btn btn-success box-shadow--4dp btn-sm-menu'),
                Button::make('print')->className('btn btn-success box-shadow--4dp btn-sm-menu'),
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
            Column::computed('DT_RowIndex')
                ->title(__('No'))
                ->width(20)
                ->addClass('text-center'),
            Column::make('expert_id')
                ->title(__('Expert Name'))
                ->addClass('text-center'),

            Column::make('pay_amount')
                ->title(__('Payment Amount'))
                ->addClass('text-center'),

            Column::make('second_pay_amount')
            ->title(__('Second Payment Amount'))
            ->addClass('text-center'),

            Column::make('rating_range')
            ->title(__('Rating Range'))
            ->addClass('text-center'),

            Column::make('created_by')
                ->title(__('Created By'))
                ->addClass('text-center'),

            Column::make('created_at')
                ->title(__('Created At'))
                ->addClass('text-center')
                ->width(100),


            Column::computed('action')
                ->title(__('Action'))
                ->searchable(false)
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
        return 'Expert_Payment_Setup' . date('YmdHis');
    }
}
