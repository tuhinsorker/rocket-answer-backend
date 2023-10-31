<?php

namespace Modules\Customer\DataTables;

use Modules\Customer\Entities\Customers;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CustomerDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param  QueryBuilder  $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query) : EloquentDataTable
    {

        return (new EloquentDataTable($query))
            ->editColumn('status', function ($query)
            {
                return $this->statusBtn($query);
            })
            ->addColumn('image', function ($query)
            {
                return $this->imageShow($query);
            })
            ->addColumn('action', function ($query)
            {
                return $query->customerActionBtn('customer-table');
            })
            ->rawColumns(['status','image', 'action'])
            ->setRowId('id')
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     */
    public function query(Customers $model) : QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html() : HtmlBuilder
    {
        return $this->builder()
            ->setTableId('customer-table')
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
            Column::make('DT_RowIndex')->title(__('SI'))->searchable(false)->orderable(false)->width(10)->addClass('text-center'),
            Column::make('image')->title(__('Image'))->defaultContent('N/A')->orderable(false)->searchable(false)->width(10),
            Column::make('name')->title(__('Name'))->defaultContent('N/A'),
            Column::make('email')->title(__('Email'))->defaultContent('N/A'),
            Column::make('phone')->title(__('Phone'))->defaultContent('N/A')->orderable(false)->searchable(false),
            Column::computed('status')->title(__('Status'))->orderable(false)->searchable(false)->width(90),
            // Column::make('created_at')->title(__('Created')),
            // Column::make('updated_at')->title(__('Updated')),
            Column::computed('action')->title(__('Action'))
                ->orderable(false)
                ->searchable(false)
                ->exportable(false)
                ->printable(false)
                ->width(120)
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
     * Status Button
     *
     * @param  User  $user
     */
    private function statusBtn($customer) : string
    {
        // $status = '<select class="form-control" name="status" id="status_id_' . $customer->id . '" ';
        // $status .= 'onchange="cusotmerStatusUpdate(\'' . route(config('theme.rprefix') . '.status-update', $customer->id) . '\',' . $customer->id . ',\'' . $customer->status . '\')">';
        // foreach (Customers::statusList() as $key => $value) {
        //     $status .= "<option value='$key' " . selected($key, $customer->status) . ">$value</option>";
        // }
        // $status .= '</select>';

        $status_name = '';
        $button_color = '';
        if($customer->status ==1){
            $status_name = 'Pending';
            $button_color = 'warning';
        }else if($customer->status == 2){
            $status_name = 'Active';
            $button_color = 'success';
        }else if($customer->status == 0){
            $status_name = 'Suspended';
            $button_color = 'danger';
        }

        $status = '<div class="btn-group">
                    <button type="button" class="btn btn-'.$button_color.' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="status_button_'.$customer->id.'">
                        '. $status_name.'
                    </button>
                    <div class="dropdown-menu" style="margin: 0px;">
                        <a class="dropdown-item" href="javascript:void(0)" id="status_1" onclick="cusotmerStatusUpdate(\'' . route(config('theme.rprefix') . '.status-update', $customer->id) . '\',' . $customer->id . ',\'' . 1 . '\')">Pending</a>
                        <a class="dropdown-item" href="javascript:void(0)" id="status_2" onclick="cusotmerStatusUpdate(\'' . route(config('theme.rprefix') . '.status-update', $customer->id) . '\',' . $customer->id . ',\'' . 2 . '\')">Active</a>
                        <a class="dropdown-item" href="javascript:void(0)" id="status_0" onclick="cusotmerStatusUpdate(\'' . route(config('theme.rprefix') . '.status-update', $customer->id) . '\',' . $customer->id . ',\'' . 0 . '\')">Suspended</a>
                    </div>
                </div>';

        return $status;
    }

    /**
     * Status Button
     *
     * @param  User  $user
     */
    private function imageShow($customer) : string
    {
        if($customer->image){
            $image = '<img src = "'.Url('/storage/'.$customer->image).'" style="width:40px;height:40px;border-radius:50px;"/>';
        }else{
            $image = '<img src = "'.nanopkg_asset('image/blank.png').'" style="width:40px;height:40px;border-radius:50px;"/>';
        }


        return $image;
    }
}
