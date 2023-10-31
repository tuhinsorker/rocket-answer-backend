<?php

namespace Modules\Cms\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cms\Entities\CmsSetting;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;

use Image;


class WebsetupController extends Controller
{
   
    public function index()
    {
        \cs_set('theme', [
            'title'       => 'Web Setup',
            'description' => 'Web Setup',
        ]);

        return view('cms::websetup.__websetup',[
            'CmsSetting'=> CmsSetting::firstWhere('id',1)
        ]);
    }

    public function socialLink()
    {
        \cs_set('theme', [
            'title'       => 'Social Link',
            'description' => 'Social Link',
        ]);
        return view('cms::websetup.__social_link',[
            'CmsSetting'=> CmsSetting::firstWhere('id',2)
        ]);
    }



   
    public function updateSetup(Request $request)
    {

        $validate = Validator::make($request->all(),
        [
            'title' => 'required',
            'email'=>'required',
            'address'=>'required',
            'weblogo' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
            'stikyweblogo'=>'image|mimes:jpeg,png,jpg,gif,svg,webp',
            'footerlogo'=>'image|mimes:jpeg,png,jpg,gif,svg,webp',
            'favicon'=>'image|mimes:jpeg,png,jpg,gif,svg,webp',
        ],
        ['required' => ':attribute is required']);


        if($validate->fails()){
            return   json_encode([  
                'success'  => false,
                'title'     =>'Post',
                'message'  => $validate->errors()->first() 
            ]);
        }


        $id = $request->id;
        if ($request->file('weblogo')!='') {
           
            //     $img = Image::make(public_path('uploads/Blank.jpg')); 
            //     $img->text('TU', 200, 140, function($font) {  
            //        $font->file(public_path('backend/assets/dist/fonts/segoe-ui/Segoe UI Bold Italic.ttf'));  
            //        $font->size(30);  
            //        $font->color('#868686');  
            //     //    $font->align('center');  
            //     //    $font->valign('top');  
            //     //    $font->angle(50);  
            //    });  
            //    return   $img->save(public_path('uploads/hardik3.jpg'));  


            $request_file = $request->file('weblogo');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('application', $filename, 'public');

            $data['weblogo']    = $path;

        }else{
            $data['weblogo']    = $request->oldweblogo;
        }

        if ($request->file('stikyweblogo')!='') {
            $request_file = $request->file('stikyweblogo');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('application', $filename, 'public');
            $data['stikyweblogo']    = $path;
        }else{
            $data['stikyweblogo']    = $request->oldstikyweblogo;
        }

        if ($request->file('footerlogo')!='') {
            $request_file = $request->file('footerlogo');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('application', $filename, 'public');
            $data['footerlogo']    = $path;
        }else{
            $data['footerlogo']    = $request->oldfooterlogo;
        }

        if ($request->file('favicon')!='') {
            $request_file = $request->file('favicon');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('application', $filename, 'public');
            $data['favicon']    = $path;
        }else{
            $data['favicon']    = $request->oldfavicon;
        }

        $data['title']          = $request->title;
        $data['footertext']     = $request->footertext;
        $data['copyright']      = $request->copyright;
        $data['metatag']        = $request->metatag;
        $data['metadescription']= $request->metadescription;
        $data['email']= $request->email;
        $data['phone']= $request->phone;
        $data['address']= $request->address;

        $websetup = CmsSetting::firstWhere('id',$id);

        $CmsSetting['event'] = 'web_setup';
        $CmsSetting['details'] = json_encode($data);

        
        if($websetup){
            
            CmsSetting::where('id',$id)->update($CmsSetting);
           
            $response = array(
                'success'  =>true,
                'title'=>'Web Setup',
                'message'  => 'Update successfully'
            );
            return json_encode($response);

        }else{

            CmsSetting::create($CmsSetting);
            $response = array(
                'success'  =>true,
                'title'=>'Web Setup',
                'message'  => 'Added successfully'
                
            );
            return json_encode($response);
        }
        
    }


    public function updateSocialLink(Request $request)
    {

        $id = $request->id;
        $websetup = CmsSetting::firstWhere('id',$id);
    

        $data = $request->all();
        $CmsSetting['event'] = 'social_link';
        $CmsSetting['details'] = json_encode($data);

        
        if($websetup){

            CmsSetting::where('id',$id)->update($CmsSetting);
           
            $response = array(
                'success'  =>true,
                'title'=>'Web Setup',
                'message'  => 'Update successfully'
            );
            return json_encode($response);

        }else{

            CmsSetting::create($CmsSetting);
            $response = array(
                'success'  =>true,
                'title'=>'Web Setup',
                'message'  => 'Added successfully'
                
            );
            return json_encode($response);
        }
        
    }



}
