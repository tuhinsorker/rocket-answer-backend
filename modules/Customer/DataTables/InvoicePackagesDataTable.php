<?php

namespace Modules\Customer\DataTables;

use Modules\Customer\Entities\Customers;
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
            ->editColumn('remaining_days', function ($query)
            {
                return $this->remainingDays($query);
            })
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
            ->addColumn('customer_email', function ($query)
            {
                if($query->customer){
                    return $query->customer->email;
                }
                return null;
            })
            ->addColumn('action', function ($query)
            {
                return '<a href="'.route(config('theme.rprefix').'.view-subscription', $query->id).'" class="btn btn-info-soft btn-sm me-1" title="View"><i class="fa fa-eye"></i></a>';
            })
            ->rawColumns(['remaining_days','customer_name','customer_email','package_name','action'])
            ->setRowId('id')
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     */
    public function query(PackageInvoice $model) : QueryBuilder
    {
        $customer_id   = $this->request->get('customer_id');

        return $model->newQuery()->with(['customer','package'])
        ->when($customer_id, function ($query) use ($customer_id) {
            $query->whereHas('customer', function($query) use($customer_id){
                $query->where('id', $customer_id);
            });
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
            Column::make('customer_email')->title(__('Email'))->defaultContent('N/A')->orderable(false),
            Column::make('package_name')->title(__('Package Name'))->defaultContent('N/A')->orderable(false)->searchable(true),
            Column::computed('price')->title(__('Price'))->orderable(true)->searchable(true),
            Column::computed('invoice_date')->title(__('Invoice Date'))->orderable(true)->searchable(true),
            Column::computed('remaining_days')->title(__('Remaining Days'))->orderable(true)->searchable(true),
            Column::computed('action')->title(__('Action'))->orderable(false)->searchable(false)
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
        return 'Customer_' . date('YmdHis');
    }

    /**
     * remainingDays
     *
     * @param  PackageInvoice  $invoice_package
     */
    private function remainingDays($invoice_package) : string
    {
        $remaining_days = 0;
        $diff_in_days   = 0;

        $current_date = \Carbon\Carbon::now();
        if(isset($invoice_package->invoice_date)){
            $invoice_date = $invoice_package->invoice_date;
            $diff_in_days = $current_date->diffInDays($invoice_date);
        }
        if(isset($invoice_package->package->duration)){
            if($diff_in_days > 0 && $diff_in_days <= (int) $invoice_package->package->duration){
                $remaining_days = (int) $invoice_package->package->duration - $diff_in_days;
            }
        }
        return $remaining_days;
    }

}
