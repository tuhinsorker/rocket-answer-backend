<?php

namespace Modules\Expert\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Expert\Entities\ExpertWithdrawRequest;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ExpertWithdrawRequestDataTable extends DataTable
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
                $show = route(config('theme.rprefix').'.show', $query->id);
                $a = '<a onclick="showWithdrawRequestModal(this)" class="btn btn-success-soft btn-sm" data-id="'.$query->id.'" data-url="'.$show.'" title="Delete"><i class="fa fa-eye"></i></a>';
                if ($query->is_approve == 0)
                {
                    $a .= '<a href="'.route('payment-transaction.create', $query->id).'"  class="btn btn-success-soft btn-sm ms-1" title="Payment Disburse"><i class="fa fa-handshake"></i></a>';
                }
                return $a;
            })
            ->addColumn('profile', function ($query)
            {
                return '<img src="'.$query->expert?->profile_img.'" style="width:40px;height:40px;border-radius:50px;">';

            })
            ->addColumn('ap_by', function ($query)
            {
                return $query->approved_by?->name;
            })
            ->editColumn('is_approve', function ($query)
            {


                $button_color = 'success';
                if ($query->is_approve == 1)
                {
                    $button_color = 'success';
                    $status_name = 'Approved';
                }
                else if ($query->is_approve == 2)
                {
                    $button_color = 'danger';
                    $status_name = 'Rejected';
                }
                else
                {
                    $button_color = 'warning';
                    $status_name = 'Pending';
                }


              return ' <div class="btn-group">
                    <button type="button" class="btn btn-'.$button_color.' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="status_button_'.$query->id.'">
                        '. $status_name.'
                    </button>
                    <div class="dropdown-menu" style="margin: 0px;">
                        <a  data-id="'.$query->id.'" data-status="0" class="dropdown-item" href="javascript:void(0)"  onclick="status_update(\'' . route(config('theme.rprefix') . '.status-update') .  '\',this)">Pending</a>
                        <a  data-id="'.$query->id.'" data-status="1" class="dropdown-item" href="javascript:void(0)"  onclick="status_update(\'' . route(config('theme.rprefix') . '.status-update') .  '\',this)">Approved</a>
                        <a  data-id="'.$query->id.'" data-status="2" class="dropdown-item" href="javascript:void(0)"  onclick="status_update(\'' . route(config('theme.rprefix') . '.status-update') .  '\',this)">Reject</a>
                    </div>
                </div>
                ';



                // return $query->is_approve ? '<span class="badge bg-success">Approved</span>' : '<span class="badge bg-danger">Pending</span>';

            })
            ->editColumn('expert_id', function ($query)
            {
                return $query->expert?->full_name;
            })
            // ->editColumn('card_type_id', function ($query)
            // {
            //     return $query->card_type?->name;
            // })
            ->setRowId('id')
            ->addIndexColumn()
            ->rawColumns(['action', 'profile', 'is_approve', 'expert_id', 'ap_by']);
    }

    /**
     * Get query source of dataTable.
     */
    public function query(ExpertWithdrawRequest $model) : QueryBuilder
    {
        $query = $model->newQuery()->with(['expert', 'approved_by']);

        $query->when($this->request()->expert_id, function ($query, $expert_id)
        {
            return $query->where('expert_id', $expert_id);
        });

        $query->when($this->request->get('my_daterange'), function ($query) {
            $dateRange  = explode("/",$this->request->get('my_daterange'));
            $startdate  = $dateRange[0];
            $enddate    = $dateRange[1];
            $query->whereDate('valid_date','>=', $startdate);
            $query->whereDate('valid_date','<=', $enddate);
        });


        // valid_date
        // $query->when($this->request()->valid_date, function ($query, $valid_date)
        // {
        //     return $query->whereDate('valid_date', $valid_date);
        // });

        // $query->when($this->request()->card_number, function ($query, $card_number)
        // {
        //     return $query->where('card_number', $card_number);
        // });

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
            Column::make('code')->title(__('Withdrawal Code'))->defaultContent('N/A'),
            Column::make('profile')->title(__('Expert Photo'))->defaultContent('N/A'),
            Column::make('expert_id')->title(__('Expert Name'))->defaultContent('N/A'),
            Column::make('request_amount')->title(__('Request Amount'))->defaultContent('N/A'),
            Column::make('request_date')->title(__('Request Date'))->defaultContent('N/A'),
            Column::make('ap_by')->title(__('Approve By'))->defaultContent('N/A'),
            Column::make('approved_date')->title(__('Approved Date'))->defaultContent('N/A'),
            // Column::make('card_type_id')->title(__('Card Type'))->defaultContent('N/A'),
            // Column::make('card_number')->title(__('Card Number'))->defaultContent('N/A'),
            // Column::make('valid_date')->title(__('Valid Date'))->defaultContent('N/A'),
            Column::make('is_approve')->title(__('Status'))->defaultContent('N/A'),

            Column::computed('action')
                ->title(__('Action'))
                ->searchable(false)
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     */
    protected function filename() : string
    {
        return 'Expert_Withdraw_Request_' . date('YmdHis');
    }
}
