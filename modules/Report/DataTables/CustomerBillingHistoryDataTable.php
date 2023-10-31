<?php

namespace Modules\Report\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Customer\Entities\Customers;
use Modules\Subcription\Entities\SubscriptionPayment;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CustomerBillingHistoryDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param  QueryBuilder  $query Results from query() method.
     */


    /**
     * Get query source of dataTable.
     */
    public function query(SubscriptionPayment $model) : QueryBuilder
    {
        $customer_id = $this->request()->get('customer_id');
        // $status = $this->request()->get('status');


        $query = $model->newQuery()->with(['customer','category', 'subscription']);

        // $query->where('payment_type', 2)->with(['customer','category', 'subscription']);

        // if(!empty($status))
        // {
        //     $query->whereHas('subscription', function($q) use ($status) {
        //         $q->where('status', $status);
        //     });
        // }
        if(!empty($customer_id))
        {
            $query->where('customer_id', $customer_id);
        }
        $query->when($this->request->get('my_daterange'), function ($query) {
                $dateRange  = explode("/",$this->request->get('my_daterange'));
                $startdate  = $dateRange[0];
                $enddate    = $dateRange[1];
                $query->whereDate('received_date','>=', $startdate);
                $query->whereDate('received_date','<=', $enddate);
            });

        return $query;

    }


    public function dataTable(QueryBuilder $query) : EloquentDataTable
    {
        return (new EloquentDataTable($query))

            ->editColumn('name', function ($query)
            {
                return $query->customer?->name;

            })

            ->editColumn('package_name', function ($query)
            {
                return $query->category?->name;

            })
            ->editColumn('type', function ($query)
            {
                if($query->payment_type == 1) {
                    return 'Trial';
                }else if($query->payment_type == 2) {
                    return 'Recurring';
                }else{
                    return 'Unknown';
                }

            })
            ->addColumn('total_amount', function ($query)
            {
                return "$".$query->total_amount;

            })

            ->setRowId('id')

            ->addIndexColumn()
            // ->rawColumns(['action', 'recurring_status'])
            ;
    }


    /**
     * Optional method if you want to use html builder.
     */
    public function html() : HtmlBuilder
    {
        return $this->builder()
            ->setTableId('customer-recurring-billing-table')
            ->columns($this->getColumns())
            // ->minifiedAjax()
            ->dom("<'row mb-3'<'col-md-4'l><'col-md-4 text-center'B><'col-md-4'f>>rt<'bottom'<'row'<'col-md-6'i><'col-md-6'p>>><'clear'>")
            ->footerCallback('function ( row, data, start, end, display ) {
                        var api = this.api(), data;
                        var intVal = function ( i ) {
                            return typeof i === \'string\' ?
                                i.replace(/[\$,]/g, \'\')*1 :
                                typeof i === \'number\' ?
                                    i : 0;
                        };
                       var total = api
                            .column( 4 )
                            .data()
                            .reduce( function (a, b) {
                                return intVal(a) + intVal(b);
                            }, 0 );

                        total = total;
                        $(api.column( 3).footer() ).html("Total");
                        $(api.column( 4 ).footer() ).html("$"+total);

                    }')
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
            // Column::make('name')
            //     ->title(__('Customer Name '))
            //     ->addClass('text-center'),
            Column::make('package_name')
                ->title(__('Package Detail'))
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('type')
                ->title(__('Type'))
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('received_date')
                ->title(__('Date'))
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('total_amount')
                ->title(__('Total Amount'))
                ->defaultContent('N/A')
                ->addClass('text-center'),


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
        return 'CustomerBillingHistory' . date('YmdHis');
    }
}
