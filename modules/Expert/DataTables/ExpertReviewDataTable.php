<?php

namespace Modules\Expert\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Expert\Entities\Expert;
use Modules\Expert\Entities\ExpertReview;
use Modules\OpenAiCreativityLevel\Entities\OpenAiCreativityLevel;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ExpertReviewDataTable extends DataTable
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
            ->editColumn('customer_id', function ($query)
            {
                return $query->customer?->name;
            })
            ->editColumn('conversation_id', function ($query)
            {
                return $query->conversation?->code;
            })
            ->setRowId('id')
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     */
    public function query(ExpertReview $model) : QueryBuilder
    {
        $expert_id = $this->request()->get('expert_id');
        $customer_id = $this->request()->get('customer_id');

        $query = $model->newQuery()->with(['expert', 'customer']);

        if(!empty($expert_id))
        {
            $query->where('expert_id', $expert_id);
        }
        if(!empty($customer_id))
        {
            $query->where('customer_id', $customer_id);
        }
        $query->when(request()->filled('code'), fn ($q) => $q->whereHas('conversation', fn ($q) => $q->where('code', 'like', '%' . request()->get('code') . '%')))
            ->when($this->request->get('my_daterange'), function ($query) {
                $dateRange  = explode("/",$this->request->get('my_daterange'));
                $startdate  = $dateRange[0];
                $enddate    = $dateRange[1];
                $query->whereDate('created_at','>=', $startdate);
                $query->whereDate('created_at','<=', $enddate);
            });

        return $query;
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
            Column::make('conversation_id')->title(__('Conversation Code'))->defaultContent('N/A'),
            Column::make('expert_id')->title(__('Expert Name'))->defaultContent('N/A'),
            Column::make('customer_id')->title(__('Customer Name'))->defaultContent('N/A'),
            Column::make('rating')->title(__('Rating'))->defaultContent('N/A'),
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
        return 'Expert_Review_' . date('YmdHis');
    }
}
