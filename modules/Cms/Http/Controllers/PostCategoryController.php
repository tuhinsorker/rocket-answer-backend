<?php

namespace Modules\Cms\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cms\Entities\PostCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;
use Modules\Cms\Entities\Post;

class PostCategoryController extends Controller
{
    
    public function index()
    {
        \cs_set('theme', [
            'title'       => 'Post Category List',
            'description' => 'Post Category List',
        ]);

        return view('cms::posts.__categories',[
            'categories' => PostCategory::get()
        ]);
    }

   
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(),
        [
            'category_name' => 'required|string|between:2,100',
            'category_slug' => 'required'
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Category',
                'message'  => $validate->errors()->first() 
            ]);
        }

        $categorys = new PostCategory();
        $category = $request->all();
        $category = $request->except(['_token','_method','id']);
        $category['category_slug'] = str_replace(' ', '-', $category['category_slug']);
        


        if($categorys->create($category)){

            $response = array(
                'success'  =>true,
                'title' => 'Create Category',
                'message'  => 'Added successfully'
            );
        }else{
            $response = array(
                'success'   => true,
                'title'     => 'Create Category',
                'message'   => 'Oops! Something went wrong, Please try again'
            );
        }

        return json_encode($response);

        
    }


    public function edit($id)
    {
        $data = PostCategory::firstWhere('id',$id);
        return json_encode($data);
    }

   
    public function update(Request $request, $id)
    {

        $validate = Validator::make($request->all(),
        [
            'category_name' => 'required|string|between:2,100',
            'category_slug' => 'required'
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Category',
                'message'  => $validate->errors()->first() 
            ]);
        }

        

        $category = $request->all();
        $category = $request->except(['_token','_method','id']);
        $category['category_slug'] = str_replace(' ', '-', $category['category_slug']);

        if(PostCategory::where('id',$id)->update($category)){
            $response = array(
                'success'  =>true,
                'title' => 'Create Category',
                'message'  => 'Update successfully'
            );
        }else{
            $response = array(
                'success'   => true,
                'title'     => 'Create Category',
                'message'   => 'Oops! Something went wrong, Please try again'
            );
        }

        return json_encode($response);

        
    }

    
    public function destroy($id)
    {

        try {
            if( Post::firstWhere('post_category_id',$id)){

                $response = array(
                    'success'   => false,
                    'title'     => 'Category',
                    'message'   => 'This category exist in a post'
                );

            }else{
                PostCategory::firstWhere('id',$id)->delete();
                $response = array(
                    'success'   => true,
                    'title'     => 'Category',
                    'message'   => 'Delete Successfully'
                );
            }
            return json_encode($response);
            
        } catch (\Exception $e){
            $response = array(
                'success'   => false,
                'title'     => 'Category',
                'message'   => 'Deleted failed'
            );
            return json_encode($response);
        }

        
       
    }


}
