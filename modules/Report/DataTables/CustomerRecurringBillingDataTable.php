<?php

namespace Modules\Report\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Customer\Entities\Customers;
use Modules\Subcription\Entities\Subscription;
use Modules\Subcription\Entities\SubscriptionPayment;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CustomerRecurringBillingDataTable extends DataTable
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
        $status = $this->request()->get('status');

        $query = $model->newQuery()->where('payment_type', 2)->with(['customer','category', 'subscription']);

        if(!empty($status))
        {
            $query->whereHas('subscription', function($q) use ($status) {
                $q->where('status', $status);
            });
        }
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
            ->addColumn('subscription_no', function ($query)
            {
                return $query->subscription?->subscription_id;

            })

            ->addColumn('customer_name', function ($query)
            {
                return $query->customer?->name;

            })

            ->addColumn('subscription_name', function ($query)
            {
                return $query->category?->name;

            })
            ->addColumn('joining_date', function ($query)
            {
                return $query->customer?->created_at?->format('M d Y');

            })






            // ->addColumn('action', function ($query)
            // {
            //     return '<a href="#" class="btn btn-primary-soft btn-sm me-1" onclick="showEditModal(' . $query->id . ')" title="Edit"><i class="fa fa-edit"></i></a>' .
            //         '<a href="#" class="btn btn-danger-soft btn-sm" onclick="delete_modal(\'' . route(config('theme.rprefix') . '.destroy', $query->id) . '\',\'expert-table\')"  title="Delete"><i class="fa fa-trash"></i></a>';
            // })
            // ->editColumn('is_active', function ($query)
            // {
            //     return $query->is_active ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';

            // })
            ->setRowId('id')

            // ->addColumn('first_billing_date', function ($query)
            // {
            //     return $query->subscriptions?->first()?->invoice_date;

            // })
            // ->addColumn('frequency', function ($query)
            // {
            //     return $query->subscriptions?->last()?->invoice_date;

            // })
            ->addColumn('frequency', function ($query)
            {
                return $query->subscription->recurring_day;

            })
            ->addColumn('counting_frequency', function ($query)
            {

                $data = SubscriptionPayment::where(['subscription_id' => $query->subscription_id])->count();

                return $data;

            })
            ->addColumn('recurring_rate', function ($query)
            {
                return $query->subscription?->recurring_price;

            })
            ->addColumn('recurring_status', function ($query)
            {
                $status =  $query->subscription?->status;
                if($status == 1){
                    return '<span class="badge bg-success">Active</span>';
                }else if($status == 0){
                    return '<span class="badge bg-danger">Inactive</span>';
                }else{
                    return '<span class="badge bg-info">Unknown</span>';
                }

            })
            ->addColumn('next_collection_date', function ($query) {
                return ($query->subscription?->recurring_invoice_date);

            })
            ->addIndexColumn()
            ->rawColumns(['action', 'recurring_status'])
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
            Column::make('subscription_no')
                ->title(__('Subscription '))
                ->addClass('text-center'),
            Column::make('customer_name')
                ->title(__('Customer Name'))
                ->addClass('text-center'),
            Column::make('subscription_name')
                ->title(__('Subscription Package'))
                ->searchable(false)
                ->orderable(false)
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('joining_date')
                ->title(__('Joining Date'))
                ->searchable(false)
                ->orderable(false)
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('received_date')
                ->title(__('First Billing Date'))
                ->searchable(false)
                ->orderable(false)
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('frequency')
                ->title(__('Frequency'))
                ->searchable(false)
                ->orderable(false)
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('counting_frequency')
                ->title(__('Counting Frequency'))
                ->searchable(false)
                ->orderable(false)
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('recurring_rate')
                ->title(__('Recurring Rate'))
                ->searchable(false)
                ->orderable(false)
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('total_amount')
                ->title(__('Total Amount'))
                ->searchable(false)
                ->orderable(false)
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('next_collection_date')
                ->title(__('Next Collection Date'))
                ->searchable(false)
                ->orderable(false)
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('recurring_status')
                ->title(__('Recurring status '))
                ->searchable(false)
                ->orderable(false)
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
        return 'Customer_Recurring_Billing_' . date('YmdHis');
    }
}
