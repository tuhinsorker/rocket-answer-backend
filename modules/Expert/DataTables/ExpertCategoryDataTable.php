<?php

namespace Modules\Expert\DataTables;

use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Expert\Entities\Expert;
use Modules\Expert\Entities\ExpertCategory;
use Modules\OpenAiCreativityLevel\Entities\OpenAiCreativityLevel;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ExpertCategoryDataTable extends DataTable
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
                return '<a href="#" class="btn btn-primary-soft btn-sm me-1" onclick="showEditModal(' . $query->id . ')" title="Edit"><i class="fa fa-edit"></i></a>' .
                    '<a href="#" class="btn btn-danger-soft btn-sm" onclick="delete_modal(\'' . route(config('theme.rprefix') . '.destroy', $query->id) . '\',\'expert-table\')"  title="Delete"><i class="fa fa-trash"></i></a>';
            })
            ->addColumn('image', function ($query)
            {
                return '<img src="'.$query->icon.'" style="width:40px;height:40px;border-radius:50px;">';

            })
            ->editColumn('is_active', function ($query)
            {
                return $query->is_active ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>';

            })
            ->setRowId('id')
            ->addIndexColumn()
            ->rawColumns(['action', 'is_active', 'image']);

    }

    /**
     * Get query source of dataTable.
     */
    public function query(ExpertCategory $model) : QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html() : HtmlBuilder
    {
        return $this->builder()
            ->setTableId('expert-table')
            ->columns($this->getColumns())
            // ->minifiedAjax()
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
            Column::computed('image')->title(__('Icon'))
            ->title(__('Icon'))
            ->searchable(false)
            ->exportable(false)
            ->printable(false)
            ->width(80),
            Column::make('name')->title(__('Name'))->defaultContent('N/A'),
            Column::make('payment_amount')->title(__('Payment Amount'))->defaultContent('N/A'),
            Column::make('second_pay_amount')->title(__('Second Pay Amount'))->defaultContent('N/A'),
            Column::make('rating_range')->title(__('Rating Range'))->defaultContent('N/A'),

            Column::make('is_active')->title(__('Status'))->defaultContent('N/A'),
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
        return 'Expert_Category' . date('YmdHis');
    }
}
