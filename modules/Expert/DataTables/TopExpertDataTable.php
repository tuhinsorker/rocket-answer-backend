<?php

namespace Modules\Expert\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Request;
use Modules\Expert\Entities\Expert;
use Modules\OpenAiCreativityLevel\Entities\OpenAiCreativityLevel;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TopExpertDataTable extends DataTable
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
                $status = $this->request->route()->parameter('status');
                $param = [];
                if(!empty($status) && $status == 1)
                {
                    $param['id'] = $query->id;
                    $param['status'] = 1;
                }else{
                    $param['id'] = $query->id;
                }

                return '<a href="'.route('expert.show',$param).'" class="btn btn-success-soft btn-sm me-1"  title="View">
                        <i class="fa fa-eye"></i>
                        </a>';
            })
            ->addColumn('profile', function ($query)
            {

                return '<img src="'.$query->profile_img.'" style="width:40px;height:40px;border-radius:50px;">';

            })
            ->editColumn('category_id', function ($query)
            {
                return $query->category?->name ?? 'N/A';
            })
            ->editColumn('sub_category_id', function ($query)
            {
                return $query->subCategory?->name ?? 'N/A';
            })
            ->editColumn('country_id', function ($query)
            {
                return $query->country?->name ?? 'N/A';
            })
            ->editColumn('status', function ($query)
            {
                if($query->status == 1) {
                    return '<span class="badge bg-success">Active</span>';
                } else if($query->status == 2) {
                    return '<span class="badge bg-danger">Inactive</span>';
                } else if($query->status == 0) {
                    return '<span class="badge bg-warning">Pending</span>';
                } else {
                    return '<span class="badge bg-info">Unknown</span>';
                }
                })
            ->rawColumns(['action','profile','status'])
            ->setRowId('id')
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     */
    public function query(Expert $model) : QueryBuilder
    {
        $status = $this->request->route()->parameter('status');
        $code = $this->request()->code;
        $email = $this->request()->email;
        $category_id = $this->request()->category_id;
        $sub_category_id = $this->request()->sub_category_id;

        $q = $model->newQuery()->with(['category','subCategory','country'])->withCount('conversations')->orderBy('conversations_count', 'desc');
        // if(!empty($status) && $status == 1)
        // {
        //     $q->where('status', 1);
        // }else{
        //     $q->whereNot('status', 1);
        // }

        if(!empty($code))
        {
            $q->where('code', $code);
        }

        if(!empty($email))
        {
            $q->where('email', $email);
        }

        if(!empty($category_id))
        {
            $q->where('category_id', $category_id);
        }

        if(!empty($sub_category_id))
        {
            $q->where('sub_category_id', $sub_category_id);
        }
        return $q;
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


            Column::make('code')->title(__('Code'))->defaultContent('N/A'),
            Column::make('profile')->title(__('Profile'))->defaultContent('N/A'),
            Column::make('display_name')->title(__('Display Name'))->defaultContent('N/A'),
            Column::make('full_name')->title(__('Full Name'))->defaultContent('N/A'),
            Column::make('email')->title(__('Email'))->defaultContent('N/A'),
            Column::make('phone')->title(__('Phone'))->defaultContent('N/A'),
            Column::make('category_id')->title(__('Category'))->defaultContent('N/A'),
            Column::make('sub_category_id')->title(__('Subcategory'))->defaultContent('N/A'),
            Column::make('rank_no')->title(__('Rating'))->defaultContent('N/A'),
            // Column::make('dob')->title(__('Date of Birth'))->defaultContent('N/A'),
            Column::make('country_id')->title(__('Country'))->defaultContent('N/A'),
            Column::make('status')->title(__('Status'))->defaultContent('N/A'),
            // Column::make('security_alert')->title(__('Security Alert'))->defaultContent('N/A'),
            // Column::make('expert_in_bio')->title(__('Expert In Bio'))->defaultContent('N/A'),
            // Column::make('user_id')->title(__('User'))->defaultContent('N/A'),
            Column::computed('action')
                ->title(__('Action'))
                ->searchable(false)
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
        return 'Expert_' . date('YmdHis');
    }
}
