<?php

namespace Modules\Cms\DataTables;

use Illuminate\Support\Str;
use Modules\Cms\Entities\Post;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class PostDataTable extends DataTable
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
            ->addColumn('post_image', function ($query)
            {
                return $this->imageShow($query);
            })
            ->addColumn('post_content', function ($query)
            {
                return Str::limit($query->content,80);
            })
            ->addColumn('create_date', function ($query)
            {
                return date('d-M-Y h:i:s', strtotime($query->created_at));
            })
            ->addColumn('action', function ($query)
            {
                return $query->actionBtn('posts-table');
            })
            ->rawColumns(['status','action','post_image','post_content'])
            ->setRowId('id')
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     */
    public function query(Post $model) : QueryBuilder
    {
        $type = 0; // Means need to fetch post type data from post table
        $category_id   = $this->request->get('category_id');

        return $model->newQuery()
        ->when($category_id, function ($query) use ($category_id) {
            $query->where('post_category_id', $category_id);
        })->where('type', $type);

    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html() : HtmlBuilder
    {
        return $this->builder()
            ->setTableId('posts-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row mb-3'<'col-md-4'l><'col-md-4 text-center'B><'col-md-4'f>>rt<'bottom'<'row'<'col-md-6'i><'col-md-6'p>>><'clear'>")
            // ->orderBy(5)
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
            Column::make('DT_RowIndex')->title(__('SI'))->searchable(false)->orderable(false)->width(5)->addClass('text-center'),
            Column::make('post_image')->title(__('Image'))->defaultContent('N/A')->width(5),
            Column::make('title')->title(__('Title'))->defaultContent('N/A')->orderable(false)->searchable(true),
            Column::make('post_content')->title(__('Content'))->defaultContent('N/A')->orderable(false)->searchable(false),
            Column::make('create_date')->title(__('Created At'))->defaultContent('N/A'),
            Column::computed('status')->title(__('Status'))->orderable(false)->searchable(false)->width(90),
            // Column::make('phone')->title(__('Phone'))->defaultContent('N/A')->orderable(false)->searchable(false),
            // Column::computed('status')->title(__('Status'))->orderable(false)->searchable(false)->width(90),
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
        return 'Posts_' . date('YmdHis');
    }

    /**
     * Status Button
     *
     * @param  User  $user
     */
    private function statusBtn($post) : string
    {
        $status_name = '';
        $button_color = '';
        if($post->status == 1){
            $status_name = 'Active';
            $button_color = 'success';
        }else if($post->status == 0){
            $status_name = 'Inctive';
            $button_color = 'warning';
        }

        $status = '<div class="btn-group">
                    <button type="button" class="btn btn-'.$button_color.' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="status_button_'.$post->id.'">
                        '. $status_name.'
                    </button>
                    <div class="dropdown-menu" style="margin: 0px;">
                        <a class="dropdown-item" href="javascript:void(0)" id="status_1" onclick="postStatusUpdate(\'' . route('cms.post-status-update', $post->id) . '\',' . $post->id . ',\'' . 1 . '\')">Active</a>
                        <a class="dropdown-item" href="javascript:void(0)" id="status_0" onclick="postStatusUpdate(\'' . route('cms.post-status-update', $post->id) . '\',' . $post->id . ',\'' . 0 . '\')">Inctive</a>
                    </div>
                </div>';

        return $status;
    }

    /**
     * Status Button
     *
     * @param  User  $user
     */
    private function imageShow($post) : string
    {
        if(isset($post->post_image)){
            $image = '<img src = "'.Url('/storage/'.$post->post_image).'" style="width:40px;height:40px;"/>';
            return $image;
        }
        $image = '<img src = "'.nanopkg_asset('image/default.jpg').'" style="width:40px;height:40px;"/>';
        return $image;
    }
}
