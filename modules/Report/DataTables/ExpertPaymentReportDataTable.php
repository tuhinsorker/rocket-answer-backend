<?php

namespace Modules\Report\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Customer\Entities\Customers;
use Modules\Expert\Entities\ExpertPaymentSetup;
use Modules\Subcription\Entities\Subscription;
use Modules\Subcription\Entities\SubscriptionPayment;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ExpertPaymentReportDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param  QueryBuilder  $query Results from query() method.
     */


    /**
     * Get query source of dataTable.
     */
    public function query(ExpertPaymentSetup $model) : QueryBuilder
    {
        $expert_id = $this->request()->get('expert_id');

        $query = $model->newQuery()->with(['expert.category', 'expert.conversations']);

        if(!empty($expert_id))
        {
            $query->whereHas('expert', function($q) use($expert_id){
                $q->where('user_id', $expert_id);
            });
        }
        $query->when($this->request->get('my_daterange'), function ($query) {
                $dateRange  = explode("/",$this->request->get('my_daterange'));
                $startdate  = $dateRange[0];
                $enddate    = $dateRange[1];
                $query->whereDate('created_at','>=', $startdate);
                $query->whereDate('created_at','<=', $enddate);
            });

        return $query;

    }


    public function dataTable(QueryBuilder $query) : EloquentDataTable
    {


        return (new EloquentDataTable($query))

            // ->addColumn('action', function ($query)
            // {
            //     return '<a href="#" class="btn btn-primary-soft btn-sm me-1" onclick="showEditModal(' . $query->id . ')" title="Edit"><i class="fa fa-edit"></i></a>' .
            //         '<a href="#" class="btn btn-danger-soft btn-sm" onclick="delete_modal(\'' . route(config('theme.rprefix') . '.destroy', $query->id) . '\',\'expert-table\')"  title="Delete"><i class="fa fa-trash"></i></a>';
            // })
            ->addColumn('expert_name', function ($query)
            {
                return $query->expert?->full_name;
            })
            ->addColumn('category_name', function ($query)
            {
                return $query->expert?->category?->name;
            })
            ->addColumn('joining_date', function ($query)
            {
                return $query->created_at?->format('M d Y');
            })
            ->addColumn('initial_share', function ($query)
            {
                return $query->pay_amount;
            })
            ->addColumn('revenue_share', function ($query)
            {
                return $query->second_pay_amount;
            })
            ->addColumn('category_charge', function ($query)
            {
                return $query->expert?->category?->second_pay_amount;
            })
            ->addColumn('completed_consultancy', function ($query)
            {
                return $query->expert?->completed_consultancy;
            })
            ->addColumn('incomplete_consultancy', function ($query)
            {
                return $query->expert?->incomplete_consultancy;
            })
            ->addColumn('number_of_consultancy', function ($query)
            {
                return $query->expert?->conversations()->count();
            })
            ->addColumn('total_earnings', function ($query)
            {
                return $query->expert?->getTotalEarnings();
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
            Column::make('expert_name')
                ->title(__('Expert Name'))
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('category_name')
                ->title(__('Category'))
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('joining_date')
                ->title(__('Joining Date'))
                ->searchable(false)
                ->orderable(false)
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('initial_share')
                ->title(__('Initial Share'))
                ->searchable(false)
                ->orderable(false)
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('revenue_share')
                ->title(__('Revenue Share'))
                ->searchable(false)
                ->orderable(false)
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('category_charge')
                ->title(__('Category Charge'))
                ->searchable(false)
                ->orderable(false)
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('number_of_consultancy')
                ->title(__('Number of Consultancy'))
                ->searchable(false)
                ->orderable(false)
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('completed_consultancy')
                ->title(__('Completed Consultancy'))
                ->searchable(false)
                ->orderable(false)
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('incomplete_consultancy')
                ->title(__('Incomplete Consultancy'))
                ->searchable(false)
                ->orderable(false)
                ->defaultContent('N/A')
                ->addClass('text-center'),
            Column::make('total_earnings')
                ->title(__('Total Earning'))
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
