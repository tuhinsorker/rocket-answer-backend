<?php

namespace Modules\Expert\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Expert\Entities\Expert;
use Modules\Expert\Entities\ExpertPayAccount;
use Modules\OpenAiCreativityLevel\Entities\OpenAiCreativityLevel;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ExpertPayAccountDataTable extends DataTable
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
            ->editColumn('expert_id', function ($query)
            {
                return $query->expert?->full_name;
            })
            ->editColumn('card_type_id', function ($query)
            {
                return $query->card_type?->name;
            })
            ->editColumn('payment_method_id', function ($query)
            {
                return $query->payment_method?->name;
            })

            ->setRowId('id')
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     */
    public function query(ExpertPayAccount $model) : QueryBuilder
    {
        // filter with expert_id, card_type_id, email, card_number
        return $model->newQuery()
            ->with(['expert', 'card_type'])
            ->when(request()->filled('expert_id'), function ($q)
            {
                $q->where('expert_id', request()->expert_id);
            })
            ->when(request()->filled('card_type_id'), function ($q)
            {
                $q->where('card_type_id', request()->card_type_id);
            })

            ->when(request()->filled('email'), function ($q)
            {
                $q->where('email', 'like', '%' . request()->email . '%');
            })
            ->when(request()->filled('card_number'), function ($q)
            {
                $q->where('card_number', 'like', '%' . request()->card_number . '%');
            });

        ;
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
            Column::make('DT_RowIndex')->title(__('SI'))->searchable(false)->orderable(false)->width(30)->addClass('text-center'),
            Column::make('expert_id')->title(__('Expert Name'))->defaultContent('N/A'),
            Column::make('name')->title(__('Account Name'))->defaultContent('N/A'),
            Column::make('email')->title(__('Account Email'))->defaultContent('N/A'),
            Column::make('card_number')->title(__('Card Number'))->defaultContent('N/A'),
            Column::make('valid_date')->title(__('Valid Date'))->defaultContent('N/A'),
            Column::make('card_type_id')->title(__('Card Type'))->defaultContent('N/A'),
            Column::make('payment_method_id')->title(__('Payment Method'))->defaultContent('N/A'),

            // Column::computed('action')
            //     ->title(__('Action'))
            //     ->searchable(false)
            //     ->exportable(false)
            //     ->printable(false)
            //     ->width(80)
            //     ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     */
    protected function filename() : string
    {
        return 'Expert_Pay_Accounts_' . date('YmdHis');
    }
}
