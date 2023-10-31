<?php

namespace Modules\Cms\DataTables;

use Illuminate\Support\Str;
use Modules\Cms\Entities\Page;
use Modules\Cms\Entities\Post;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Modules\Cms\Entities\TeamMembers;

class TeamMemberDataTable extends DataTable
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
            ->addColumn('photo', function ($query)
            {
                return $this->imageShow($query);
            })
            // ->addColumn('post_content', function ($query)
            // {
            //     return Str::limit($query->content,80);
            // })
            // ->addColumn('create_date', function ($query)
            // {
            //     return date('d-M-Y h:i:s', strtotime($query->created_at));
            // })
            ->addColumn('action', function ($query)
            {
                $edit_route = route('cms.team-member.edit',$query->id);
                $update_route = route('cms.team-member.update',$query->id);
                $delete_route = route('cms.team-member.destroy',$query->id);

                return '<a href="javascript:void(0);" class="btn btn-primary btn-sm " id="editEducation" data-update-route="'.$update_route.'" data-edit-route="'.$edit_route.'"  ><i class="far fa-edit"></i></a>
                <a href="javascript:void(0);" class="btn btn-danger btn-sm " id="deleteEducation" data-delete-route="'.$delete_route.'" data-edit-route="'.$edit_route.'" ><i class="fas fa-trash"></i></a>';
            })
            ->rawColumns(['status','action', 'photo'])
            // ->rawColumns(['status','action','post_image','post_content'])
            ->setRowId('id')
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     */
    public function query(TeamMembers $model) : QueryBuilder
    {
         return $model->newQuery();
        // ->when($category_id, function ($query) use ($category_id) {
        //     $query->where('post_category_id', $category_id);
        // })->where('type', $type);

    }

    /**
     * Optional method if you want to use html builder.
     */
    public function html() : HtmlBuilder
    {
        return $this->builder()
            ->setTableId('team-member-table')
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
            Column::make('name')->title(__('Name'))->defaultContent('N/A')->width(5),
            Column::make('designation')->title(__('Designation'))->defaultContent('N/A')->orderable(false)->searchable(true),
            Column::make('photo')->title(__('Photo'))->defaultContent('N/A')->orderable(false)->searchable(false),
            Column::make('status')->title(__('Status'))->searchable(false)->orderable(false)->defaultContent('N/A'),
            Column::make('fb')->title(__('Facebook'))->defaultContent('N/A'),
            Column::make('twitter')->title(__('Twitter'))->defaultContent('N/A'),
            Column::make('linkedin')->title(__('LinkedIn'))->defaultContent('N/A'),

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
        return 'TeamMembers_' . date('YmdHis');
    }

    /**
     * Status Button
     *
     * @param  User  $user
     */
    private function statusBtn($post) : string
    {
        if($post->is_active == 1){
            $status = '<button type="button" class="btn btn-success btn-sm">Active</button>';
        }else{
            $status =  '<button type="button" class="btn btn-danger btn-sm">Inactive</button>';
        }


        return $status;
    }

    /**
     * Status Button
     *
     * @param  User  $user
     */
    private function imageShow($post) : string
    {
        if(isset($post->profile)){
            $image = '<img src = "'.Url('/storage/'.$post->profile).'" style="width:40px;height:40px;"/>';
            return $image;
        }
        $image = '<img src = "'.nanopkg_asset('image/default.jpg').'" style="width:40px;height:40px;"/>';
        return $image;

    }
}
