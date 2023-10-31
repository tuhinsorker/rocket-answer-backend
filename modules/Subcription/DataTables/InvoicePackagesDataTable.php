<?php

namespace Modules\Subcription\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Subcription\Entities\PackageInvoice;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class InvoicePackagesDataTable extends DataTable
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
            ->addColumn('package_name', function ($query)
            {
                if($query->package){
                    return $query->package->title;
                }
                return null;
            })
            ->addColumn('action', function ($query)
            {

                $action = '<a onclick="showInvoiceDetail('.$query->id.')" href="javascript:void(0)" class="text-white btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#invoice-'.$query->id.'" title="View"><i class="fa fa-eye"></i></a>';
                $action.= view('subcription::modals.invoice-details_2',['invoice' => $query])->render();
                return $action;
            })
            ->rawColumns(['customer_name','package_name','action'])
            ->setRowId('id')
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     */
    public function query(PackageInvoice $model) : QueryBuilder
    {
        $customer_id   = $this->request->get('customer_id');
        $invoice_id   = $this->request->get('invoice_id');

        return $model->newQuery()->with(['customer','package'])
        ->when($customer_id, function ($query) use ($customer_id) {
            $query->whereHas('customer', function($query) use($customer_id){
                $query->where('id', $customer_id);
            });
        })->when($invoice_id, function ($query) use ($invoice_id) {
            $query->where('invoice_id', $invoice_id);
        })->when($this->request->get('my_daterange'), function ($query) {
            $dateRange  = explode("/",$this->request->get('my_daterange'));
            $startdate  = $dateRange[0];
            $enddate    = $dateRange[1];
            $query->whereDate('invoice_date','>=', $startdate);
            $query->whereDate('invoice_date','<=', $enddate);
        });



        // return $model->newQuery()->with(['customer','package']);
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
            ->orderBy(5)
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
            Column::make('invoice_id')->title(__('Invoice No'))->defaultContent('N/A'),
            // Column::make('title')->title(__('Title'))->defaultContent('N/A')->orderable(false),
            Column::make('customer_name')->title(__('Customer Name'))->defaultContent('N/A')->orderable(false),
            Column::make('package_name')->title(__('Package Name'))->defaultContent('N/A')->orderable(false)->searchable(true),
            Column::computed('price')->title(__('Price'))->orderable(true)->searchable(true),
            Column::computed('invoice_date')->title(__('Invoice Date'))->orderable(true)->searchable(true)
                ->exportable(false)
                ->printable(false)
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
