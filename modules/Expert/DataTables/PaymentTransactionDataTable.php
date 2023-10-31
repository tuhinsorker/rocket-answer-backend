<?php

namespace Modules\Expert\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Expert\Entities\ExpertWithdrawRequest;
use Modules\Expert\Entities\PaymentTransaction;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PaymentTransactionDataTable extends DataTable
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
                if($query->transaction_type == 2) {

                    return '<a href="#" class="btn btn-primary-soft btn-sm me-1" onclick="showEditModal(' . $query->id . ')" title="Edit"><i class="fa fa-edit"></i></a>' .
                        '<a href="#" class="btn btn-danger-soft btn-sm" onclick="delete_modal(\'' . route(config('theme.rprefix') . '.destroy', $query->id) . '\',\'expert-table\')"  title="Delete"><i class="fa fa-trash"></i></a>';
                }else{
                    return '';
                }
            })

            ->editColumn('conversation_id', function ($query)
            {
                return $query->conversation?->id ?? 'N/A';
            })

            ->editColumn('attachment', function ($query)
            {
                return $query->transaction_type !==1 ?'<a href="#" class="doc-download" onclick="downloadFile(\''.$query->attachment_url.'\')"> <i class="fa fa-download"></i></a>':'';
            })

            ->editColumn('transaction_type', function ($query)
            {

                return $query->transaction_type == 1 ? '<span class="badge bg-success">In</span>' : '<span class="badge bg-danger">Out</span>';
            })

            ->editColumn('expert_id', function ($query)
            {
                return $query->expert?->full_name;
            })
            ->setRowId('id')
            ->addIndexColumn()
            ->rawColumns(['attachment', 'transaction_type']);
    }

    /**
     * Get query source of dataTable.
     */
    public function query(PaymentTransaction $model) : QueryBuilder
    {
        $query = $model->newQuery()->with(['expert', 'conversation'])->orderBy('id','DESC');

        $query->when($this->request()->expert_id, function ($query, $expert_id)
        {
            return $query->where('expert_id', $expert_id);
        });

        $query->when($this->request->get('my_daterange'), function ($query) {
            $dateRange  = explode("/",$this->request->get('my_daterange'));
            $startdate  = $dateRange[0];
            $enddate    = $dateRange[1];
            $query->whereDate('payment_date','>=', $startdate);
            $query->whereDate('payment_date','<=', $enddate);
        });

        $query->when($this->request()->transaction_type, function ($query, $transaction_type)
        {
            return $query->where('transaction_type', $transaction_type);
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
            // Column::make('conversation_id')->title(__('Conversation Code'))->searchable(true)->orderable(true)->width(100)->addClass('text-center'),
            Column::make('expert_id')->title(__('Expert'))->searchable(true)->orderable(true)->width(100)->addClass('text-center'),
            Column::make('amount')->title(__('Amount'))->searchable(true)->orderable(true)->width(100)->addClass('text-center'),
            Column::make('transaction_type')->title(__('Transaction Type'))->searchable(true)->orderable(true)->width(100)->addClass('text-center'),
            Column::make('payment_date')->title(__('Payment Date'))->searchable(true)->orderable(true)->width(100)->addClass('text-center'),
           Column::make('attachment')->title(__('Attachment'))->searchable(true)->orderable(true)->width(100)->addClass('text-center'),



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
        return 'Payment_Transaction_' . date('YmdHis');
    }
}
