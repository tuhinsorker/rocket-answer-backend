<?php

namespace Modules\Cms\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cms\Entities\Testimonial;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;
use Modules\Cms\Entities\HowItWork;

class TestimonialController extends Controller
{

    public function index()
    {
        \cs_set('theme', [
            'title'       => 'Testimonials',
            'description' => 'Testimonials',
        ]);

        return view('cms::testimonials.__list',[
            'testimonials' => Testimonial::get()
        ]);
    }

   
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(),
        [
            'header' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|max:2048|mimes:jpeg,png,jpg,svg,webp',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Testimonial',
                'message'  => $validate->errors()->first() 
            ]);
        }

        $testimonials = new Testimonial();
        $testimonial = $request->all();
        $testimonial = $request->except(['_token','_method','id']);

        if($request->hasFile('image')){
            $request_file = $request->file('image');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('cms/testimonial', $filename, 'public');
            $testimonial['image']    = $path;
        }
        
    

        if($testimonials->create($testimonial)){

            $response = array(
                'success'  =>true,
                'title'     => 'Testimonial',
                'message'  => 'Added successfully'
            );
        }else{
            $response = array(
                'success'   => true,
                'title'     => 'Testimonial',
                'message'   => 'Oops! Something went wrong, Please try again'
            );
        }

        return json_encode($response);

        
    }


    public function edit($id)
    {
        $data = Testimonial::firstWhere('id',$id);
        return json_encode($data);
    }

   
    public function update(Request $request, $id)
    {

        
        $validate = Validator::make($request->all(),
        [
            'header' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|max:2048|mimes:jpeg,png,jpg,svg,webp',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Testimonial',
                'message'  => $validate->errors()->first() 
            ]);
        }

        $testimonials = new Testimonial();
        $testimonial = $request->all();
        $testimonial = $request->except(['_token','_method','id']);

        if($request->hasFile('image')){
            $request_file = $request->file('image');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('cms/testimonial', $filename, 'public');
            $testimonial['image']    = $path;
        }

        

        if(Testimonial::where('id',$id)->update($testimonial)){
            $response = array(
                'success'  =>true,
                'title' => 'Testimonial',
                'message'  => 'Update successfully'
            );
        }else{
            $response = array(
                'success'   => true,
                'title'     => 'Testimonial',
                'message'   => 'Oops! Something went wrong, Please try again'
            );
        }

        return json_encode($response);

        
    }

    
    public function destroy($id)
    {

        try {
            Testimonial::firstWhere('id',$id)->delete();
            $response = array(
                'success'   => true,
                'title'     => 'testimonial',
                'message'   => 'Delete Successfully'
            );
            return json_encode($response);
            
        } catch (\Exception $e){
            $response = array(
                'success'   => false,
                'title'     => 'testimonial',
                'message'   => 'Deleted failed'
            );
            return json_encode($response);
        }  
    }



    public function howItWork()
    {
        \cs_set('theme', [
            'title'       => 'How It Work',
            'description' => 'How It Work',
        ]);

        return view('cms::howitwork.__list',[
            'lists' => HowItWork::get()
        ]);
    }

   
    public function howItWorkStore(Request $request)
    {

        $validate = Validator::make($request->all(),
        [
            'header' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|max:2048|mimes:jpeg,png,jpg,svg,webp',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'How It Work',
                'message'  => $validate->errors()->first() 
            ]);
        }

        $testimonials = new HowItWork();
        $testimonial = $request->all();
        $testimonial = $request->except(['_token','_method','id']);

        if($request->hasFile('image')){
            $request_file = $request->file('image');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('cms/testimonial', $filename, 'public');
            $testimonial['image']    = $path;
        }
    

        if($testimonials->create($testimonial)){

            $response = array(
                'success'  =>true,
                'title'     => 'How It Work',
                'message'  => 'Added successfully'
            );
        }else{
            $response = array(
                'success'   => true,
                'title'     => 'How It Work',
                'message'   => 'Oops! Something went wrong, Please try again'
            );
        }

        return json_encode($response);

        
    }


    public function howItWorkEdit($id)
    {
        $data = HowItWork::firstWhere('id',$id);
        return json_encode($data);
    }

   
    public function howItWorkUpdate(Request $request, $id)
    {

        
        $validate = Validator::make($request->all(),
        [
            'header' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|max:2048|mimes:jpeg,png,jpg,svg,webp',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'How It work',
                'message'  => $validate->errors()->first() 
            ]);
        }

        $testimonials = new HowItWork();
        $testimonial = $request->all();
        $testimonial = $request->except(['_token','_method','id']);

        if($request->hasFile('image')){

            $file = $request->file('image');
            $destinationPath = 'cms/testimonial';
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs($destinationPath, $fileName, 'public');
            $testimonial['image'] = $filePath;

        }


        // if($request->hasFile('image')){
        //     $request_file = $request->file('image');
        //     $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
        //     $path         = $request_file->storeAs('cms/testimonial', $filename, 'public');
        //     $testimonial['image']    = $path;
        // }

        if(HowItWork::where('id',$id)->update($testimonial)){
            $response = array(
                'success'  =>true,
                'title' => 'How It Work',
                'message'  => 'Update successfully'
            );
            return json_encode($response);
        }else{
            $response = array(
                'success'   => true,
                'title'     => 'How It Work',
                'message'   => 'Oops! Something went wrong, Please try again'
            );
            return json_encode($response);
        }

        

        
    }

    
    public function howItWorkDelete($id)
    {

        try {
            HowItWork::firstWhere('id',$id)->delete();
            $response = array(
                'success'   => true,
                'title'     => 'How It Work',
                'message'   => 'Delete Successfully'
            );
            return json_encode($response);
            
        } catch (\Exception $e){
            $response = array(
                'success'   => false,
                'title'     => 'How It Work',
                'message'   => 'Deleted failed'
            );
            return json_encode($response);
        }  
    }

}
