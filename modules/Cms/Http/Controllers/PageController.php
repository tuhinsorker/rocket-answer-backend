<?php

namespace Modules\Cms\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Modules\Cms\Entities\Post;
use Yajra\DataTables\DataTables;
use Illuminate\Routing\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Modules\Cms\Entities\PostCategory;
use Illuminate\Support\Facades\Session;
use Modules\Cms\DataTables\PageDataTable;
use Modules\Expert\Entities\ExpertCategory;

class PageController extends Controller
{

    /**
     * Constructor for the controller.
     *
     * @return void
     */
    public function __construct()
    {
        \cs_set('theme', [
            'title'       => 'Page List',
            'description' => 'Displaying all Pages.',
            'back'        => \back_url(),
            'breadcrumb'  => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Page List',
                    'link' => false,
                ],
            ],
            'rprefix'     => 'cms.pages',
        ]);

        // dd(route(config('theme.rprefix')));
    }

    public function index(PageDataTable $dataTable)
    {

        return $dataTable->render('cms::pages.__pages',['categories' => ExpertCategory::get()]);
    }

   
    public function create()
    {
        \cs_set('theme', [
            'title'       => 'Create Page',
            'description' => 'Create Page',
        ]);

        return view('cms::pages.__create',[
            'categories' => ExpertCategory::get()
        ]);
    }


    public function store(Request $request)
    {
        
        $request->validate(
        [
            'title'         => 'required',
            'content'       => 'required',
            'post_image'    => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $postdata = array(
            'title'             => $request->title,
            'post_category_id'  => $request->category_id,
            'content'           => $request->content,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'type'              => 1,
        );

       
        if ($request->file('post_image')) {
            
            $request_file = $request->file('post_image');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('post_image', $filename, 'public');
            $postdata['post_image']    = $path;

        }else{
            $postdata['post_image']    = '';
        }

        if(Post::create($postdata)){
            // $this->sitemapXml();
            Session::flash('success', 'Successfully Stored new page data.');
            
            return redirect()->route('cms.pages.index');
        }else{
            Session::flash('exception', "Oops! Something went wrong, Please try again");
            return redirect()->route('cms.pages.index');
        }

    }

  
    public function show($id)
    {
        return view('cms::show');
    }

  
    public function edit($id)
    {
        \cs_set('theme', [
            'title'       => 'Update Page',
            'description' => 'Update Page',
        ]);

        return view('cms::pages.__edit',[
            'categories' => ExpertCategory::get(),
            'post' => Post::where('id',$id)->where('type', 1)->first()
        ]);
    }

    public function update(Request $request, $id)
    {

        $request->validate(
        [
            'title' => 'required|string|between:2,100',
            'content' => 'required',
            'post_image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        $postdata = array(
            'title'             => $request->title,
            'post_category_id'  => $request->category_id,
            'content'           => $request->content,
            'meta_title'        => $request->meta_title,
            'meta_description'  => $request->meta_description,
            'type'              => 1,

        );
       
        if ($request->file('post_image')) {
            $request_file = $request->file('post_image');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('post_image', $filename, 'public');
            $postdata['post_image']    = $path;
        }

        if(Post::where('id',$id)->update($postdata)){

            // $this->sitemapXml();

            Session::flash('success', 'Updated successfully');
            return redirect()->route('cms.pages.index');

        }else{

            Session::flash('exception', 'Oops! Something went wrong, Please try again');
            return redirect()->route('cms.pages.index');
        }

    }
  
    public function destroy($id)
    {

        try {
            Post::where('id',$id)->delete();
            $response = array(
                'success'   => true,
                'title'     => 'Post',
                'message'   => 'Delete Successfully'
            );
        
            return json_encode($response);
            
        } catch (\Exception $e){
            $response = array(
                'success'   => false,
                'title'     => 'Post',
                'message'   => $e->getMessage()
            );
            return json_encode($response);
        }
       
    }
    

    public function getPost(Request $request)
    {

        
        if ($request->ajax()) {

            $data = Post::where('status',1)->orderbyDesc('id')->get();



            return DataTables::of($data)->addIndexColumn()

                // ->addColumn('post_image', function ($data) {
                //     return '<img src="'.getImage($data->post_image).'" width="50">';
                // })

                ->addColumn('post_image', function ($data) {
                    return '<img src="'.getImage($data->post_image).'" width="50">';
                })
                
                ->addColumn('title', function ($data) {
                    return $data->title;
                })

                ->addColumn('meta_title', function ($data) {
                    return $data->meta_title;
                })

                ->addColumn('meta_description', function ($data) {
                    return $data->meta_description;
                })

                ->addColumn('content', function ($data) {
                    return Str::limit($data->content,80);
                })

                ->addColumn('action', function($data){
                    $actionBtn = '<a href="'.route('posts.edit',$data->id).'"  data-update-route="'.route('posts.update',$data->id).'" data-edit-route="'.route('posts.edit',$data->id).'" class="btn btn-success btn-sm"><i class="far fa-edit"></i></a> '; 
                    $actionBtn .= '<a href="javascript:void(0)" id="deleteAction" data-delete-route="'.route('delete-post',$data->id).'" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>';
                    return $actionBtn;
                })

            ->rawColumns(['sl','post_image', 'title','meta_title','meta_description','content','action'])
            ->escapeColumns('post_image')->make(true);
        }

    }



    public function sitemapXml(){

        @$info =  PostCategory::withCount('posts')->get();

        $posts  = Post::with('user','category')->latest('created_at')->limit(20)->get();



        $xml ="<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
        $xml.="<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";
        
        foreach ($info as $key => $cat) {
            
            if($cat->posts_count>0){
            $xml.="
                <url>
                    <loc>" .url('category-post').'/'.$cat->category_slug. "</loc>
                    <lastmod> always </lastmod>
                    <priority>1.0</priority>    
                </url>\n";
            }   
        }

        foreach ($posts as $key => $value) {
            if($value->title!=''){
            $xml.="
                <url>
                    
                    <loc>" . url('post-detail',$value->uuid) . "</loc>
                    <lastmod> ".date('d M Y',strtotime($value->post_date))." </lastmod>
                    <priority>1.0</priority>    
                </url>\n";
            } 
        }

        $xml.="</urlset>\n";
        $file = fopen("sitemap.xml","w");
        fwrite($file,$xml);
        fclose($file);
    }  
    
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statusUpdate(Request $request)
    {
        $post = Post::where('id', $request->id)->first();

        $post->update(['status' => $request->status]);

        return \response()->success($post, 'Page Status Updated Successfully.', 200);
    }

}
