<?php

namespace Modules\Subcription\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Subcription\Entities\Subscription;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SubscriptionPaymentDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param  QueryBuilder  $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query) : EloquentDataTable
    {


        return (new EloquentDataTable($query))

            ->addColumn('customer_name', function ($query)
            {
                if($query->customer){
                    return $query->customer->name;
                }
                return null;
            })
            ->addColumn('category_name', function ($query)
            {
                if($query->category){
                    return $query->category->name;
                }
                return null;
            })
            ->addColumn('status', function ($query)
            {
                if($query->status==1){
                    $status = '<span class="badge bg-success">Active</span>';
                }else{
                    $status = '<span class="badge bg-danger">Canceled</span>';
                }
                return $status;
            })

            ->addColumn('action', function ($query)
            {
                $action = '<a onclick="showInvoiceDetail('.$query->id.')" href="javascript:void(0)" class="text-white btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#invoice-'.$query->id.'" title="View"><i class="fa fa-eye"></i></a>';
                $action.= view('subcription::subscription.invoice-details_2',['invoice' => $query])->render();
                return $action;
            })
            ->rawColumns(['customer_name','category_name','status','action'])
            ->setRowId('id')
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     */
    public function query(Subscription $model) : QueryBuilder
    {

        $customer_id   = $this->request->get('customer_id');
        $invoice_id   = $this->request->get('invoice_id');

        return $model->newQuery()->with(['customer','category'])
        ->when($customer_id, function ($query) use ($customer_id) {
            $query->whereHas('customer', function($query) use($customer_id){
                $query->where('id', $customer_id);
            });
        })->when($invoice_id, function ($query) use ($invoice_id) {
            $query->where('subscription_id', $invoice_id);
        })->when($this->request->get('my_daterange'), function ($query) {
            $dateRange  = explode("/",$this->request->get('my_daterange'));
            $startdate  = $dateRange[0];
            $enddate    = $dateRange[1];
            $query->whereDate('invoice_date','>=', $startdate);
            $query->whereDate('invoice_date','<=', $enddate);
        });

    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html() : HtmlBuilder
    {
        return $this->builder()
            ->setTableId('customer-subscription-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row mb-3'<'col-md-4'l><'col-md-4 text-center'B><'col-md-4'f>>rt<'bottom'<'row'<'col-md-6'i><'col-md-6'p>>><'clear'>")
            // ->orderBy(1)
            // ->selectStyleSingle()
            ->parameters([
                'responsive' => true,
                'autoWidth'  => false,
            ])
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
            Column::make('subscription_id')->title(__('subscription No'))->defaultContent('N/A'),
            Column::computed('customer_name')->title(__('Customer Name'))->orderable(true)->searchable(true),
            Column::computed('category_name')->title(__('Category Name'))->orderable(true)->searchable(true),
            Column::computed('trial_day')->title(__('Trial Day'))->orderable(true)->searchable(true),
            Column::computed('trial_price')->title(__('Trial Price'))->orderable(true)->searchable(true),
            Column::computed('recurring_day')->title(__('Recurring Day'))->orderable(true)->searchable(true),
            Column::computed('recurring_price')->title(__('Recurring Price'))->orderable(true)->searchable(true),

            Column::computed('invoice_date')->title(__('Invoice Date'))->orderable(true)->searchable(true)
                ->exportable(false)
                ->printable(false)
                ->width(80)
                ->addClass('text-center'),

            Column::computed('recurring_invoice_date')->title(__('Recurring Invoice Date'))->orderable(true)->searchable(true)
            ->exportable(false)
            ->printable(false)
            ->width(80)
            ->addClass('text-center'),

            Column::computed('status')->title(__('Status'))
            ->orderable(false)
            ->searchable(false)
            ->printable(false)
            ->exportable(false)
            ->width(80)
            ->addClass('text-center'),

            Column::computed('action')->title(__('Action'))
                ->orderable(false)
                ->searchable(false)
                ->printable(false)
                ->exportable(false)
                ->width(80)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     */
    protected function filename() : string
    {
        return 'Customer_' . date('YmdHis');
    }
}
