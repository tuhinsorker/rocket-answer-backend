<?php

namespace Modules\Customer\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Conversation\Entities\Conversations;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CustomerConversationDataTable extends DataTable
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
            ->addColumn('expert_name', function ($query)
            {
                if($query->expert){
                    return $query->expert->first_name.' '.$query->expert->last_name;
                }
                return null;
            })
            ->addColumn('expert_category_name', function ($query)
            {
                if($query->expert_category){
                    return $query->expert_category->name;
                }
                return null;
            })
            ->addColumn('expert_sub_category_name', function ($query)
            {
                if($query->expert_sub_category){
                    return $query->expert_sub_category->name;
                }
                return null;
            })
            ->addColumn('is_customer_closed', function ($query)
            {
                if($query->is_customer_closed==1){
                    return  '<span class="badge bg-success">Closed</span>';
                }else{
                    return  '<span class="badge bg-danger">Not Closed</span>';
                }
            })
            ->addColumn('is_expert_closed', function ($query)
            {
                if($query->is_expert_closed==1){
                    return  '<span class="badge bg-success">Closed</span>';
                }else{
                    return  '<span class="badge bg-danger">Not Closed</span>';
                }
            })

            ->addColumn('action', function ($query)
            {
                $btn = $query->conversationActionBtn('customer-subscription-table');
                if($query->is_expert_closed && $query->rating == null){

                    $btn.= '<a href="#" class="btn btn-success-soft btn-sm me-1" onclick="showRatingModal('.$query->id.')" title="Conversation Logs"><i class="fa fa-star"></i></a>';
                }
                return $btn;
            })
            ->rawColumns(['customer_name', 'expert_name', 'expert_category_name', 'expert_sub_category_name','is_customer_closed','is_expert_closed','action'])
            ->setRowId('id')
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     */
    public function query(Conversations $model) : QueryBuilder
    {
        $customer_id   = $this->request->get('customer_id');

        return $model->newQuery()->with(['customer','expert','expert_category','expert_sub_category'])

        ->when($this->request()->expert_id, function ($query) {
            $query->where('expert_id', $this->request->get('expert_id'));
        })->when($customer_id, function ($query) use ($customer_id) {
            $query->where('customer_id', $customer_id);
        })->when($this->request->get('expert_category_id'), function ($query) {
            $query->where('expert_category_id', $this->request->get('expert_category_id'));
        })->when($this->request->get('my_daterange'), function ($query) {
            
            $dateRange  = explode("/",$this->request->get('my_daterange'));
            $startdate  = $dateRange[0];
            $enddate    = $dateRange[1];

            $query->whereDate('date','>=', $startdate);
            $query->whereDate('date','<=', $enddate);
        })->orderBy('id','DESC');

        // return $model->newQuery()->with(['customer','package']);
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html() : HtmlBuilder
    {
        return $this->builder()
            ->setTableId('customer-conversation')
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
            Column::make('code')->title(__('Code'))->defaultContent('N/A'),
            // Column::make('title')->title(__('Title'))->defaultContent('N/A')->orderable(false),
            Column::make('customer_name')->title(__('Cus. Name'))->defaultContent('N/A')->orderable(false),
            Column::make('expert_name')->title(__('Exp. Name'))->defaultContent('N/A')->orderable(false),
            Column::make('expert_category_name')->title(__('Exp Category'))->defaultContent('N/A')->orderable(false),
            Column::make('expert_sub_category_name')->title(__('Exp Sub Category'))->defaultContent('N/A')->orderable(false),
            Column::make('subject')->title(__('Subject'))->defaultContent('N/A')->orderable(false)->searchable(true),
            Column::computed('price')->title(__('Price'))->orderable(true)->searchable(true),
            Column::computed('date')->title(__('Date'))->orderable(true)->searchable(true),
            Column::computed('start_time')->title(__('Start Time'))->orderable(true)->searchable(true),
            Column::computed('end_time')->title(__('End Time'))->orderable(true)->searchable(true),
            Column::computed('rating')->title(__('Rating'))->orderable(true)->searchable(true),
            Column::computed('is_customer_closed')->title(__('Cus. Status'))->orderable(true)->searchable(true),
            Column::computed('is_expert_closed')->title(__('Exp. Status'))->orderable(true)->searchable(true),


            Column::computed('action')->title(__('Action'))
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
}
