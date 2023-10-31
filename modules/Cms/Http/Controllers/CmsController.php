<?php

namespace Modules\Cms\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cms\Entities\CmsSetting;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;

class CmsController extends Controller
{
   
    public function index()
    {
        return view('cms::index');
    }


    public function privacyPolicy()
    {
        
        \cs_set('theme', [
            'title'       => 'Privacy Policy',
            'description' => 'Privacy Policy',
        ]);

        return view('cms::websetup.__privacy_policy',[
            'CmsSetting'=> CmsSetting::firstWhere('id',3)
        ]);
    }
    


    public function updatePrivacyPolicy(Request $request)
    {

        $id = $request->id;
        $websetup = CmsSetting::firstWhere('id',$id);
        $data = $request->all();
        $CmsSetting['event'] = 'Privacy-Policy';
        $CmsSetting['details'] = json_encode($data);


        if($websetup){
          
            CmsSetting::where('id',$id)->update($CmsSetting);
            $response = array(
                'success'  =>true,
                'title'=>'Privacy-Policy',
                'message'  => 'Update successfully'
            );

            // flash message
            Session::flash('success', 'Successfully Updated.');
            return \redirect()->route('cms.privacy-policy-setup');

            // return json_encode($response);

        }else{

            CmsSetting::create($CmsSetting);
            $response = array(
                'success'  =>true,
                'title'=>'Privacy-Policy',
                'message'  => 'Added successfully'
                
            );

            // flash message
            Session::flash('success', 'Successfully Created.');
            return \redirect()->route('cms.privacy-policy-setup');

            // return json_encode($response);
        }
    }


    public function termsofService()
    {
        \cs_set('theme', [
            'title'       => 'Terms Of service',
            'description' => 'Terms Of service',
        ]);

        return view('cms::websetup.__terms_of_service',[
            'CmsSetting'=> CmsSetting::firstWhere('id',4)
        ]);
    }
    





    public function updateTermsofService(Request $request)
    {

        $id = $request->id;
        $websetup = CmsSetting::firstWhere('id',$id);
        $data = $request->all();
        $CmsSetting['event'] = 'Terms-Of-Service';
        $CmsSetting['details'] = json_encode($data);

        
        if($websetup){

            CmsSetting::where('id',$id)->update($CmsSetting);
            $response = array(
                'success'  =>true,
                'title'=>'Terms-Of-Service',
                'message'  => 'Update successfully'
            );

            // flash message
            Session::flash('success', 'Successfully Updated.');
            return \redirect()->route('cms.add-terms-of-service');

            // return json_encode($response);

        }else{

            CmsSetting::create($CmsSetting);
            $response = array(
                'success'  =>true,
                'title'=>'Terms-Of-Service',
                'message'  => 'Added successfully'
                
            );

            // flash message
            Session::flash('success', 'Successfully Created.');
            return \redirect()->route('cms.add-terms-of-service');

            // return json_encode($response);
        }
    }


    public function landingPageSetup()
    {
        \cs_set('theme', [
            'title'       => 'Landing Page Setup',
            'description' => 'Landing Page Setup',
        ]);


        return view('cms::websetup.__landing_page',[
            'CmsSetting'=> CmsSetting::firstWhere('id',6)
        ]);
    }
    

    public function updateLandingPageSetup(Request $request)
    {


        $validate = Validator::make($request->all(),
        [
            'head_bg_img' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
            'get_start_img'=>'image|mimes:jpeg,png,jpg,gif,svg,webp',
            'app_img'=>'image|mimes:jpeg,png,jpg,gif,svg,webp',
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
        $websetup = CmsSetting::firstWhere('id',$id);
        $data = $request->all();

        if ($request->hasFile('head_bg_img')) {
            $file = $request->file('head_bg_img');
            //Upload File
            $destinationPath = 'cms';
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs($destinationPath, $fileName, 'public');
            $data['head_bg_img'] = $filePath;
        }else{
            $data['head_bg_img'] = $request->head_bg_img_old;
        }

        if ($request->hasFile('get_start_img')) {
            $file = $request->file('get_start_img');
            //Upload File
            $destinationPath = 'cms';
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs($destinationPath, $fileName, 'public');
            $data['get_start_img'] = $filePath;
        }else{
            $data['get_start_img'] = $request->get_start_img_old;
        }

        if ($request->hasFile('app_img')) {
            $file = $request->file('app_img');
            //Upload File
            $destinationPath = 'cms';
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs($destinationPath, $fileName, 'public');
            $data['app_img'] = $filePath;
        }else{
            $data['app_img'] = $request->app_img_old;
        }
        $CmsSetting['event'] = 'landing_page';
        $CmsSetting['details'] = json_encode($data);

        
        if($websetup){

            CmsSetting::where('id',$id)->update($CmsSetting);
            $response = array(
                'success'   => true,
                'title'     => 'Landing Page',
                'message'   => 'Update successfully'
            );
            return json_encode($response);
            // flash message
            Session::flash('success', 'Successfully Updated.');
            return \redirect()->route('cms.landing-page-setup');
            // return json_encode($response);

        }else{

            CmsSetting::create($CmsSetting);
            $response = array(
                'success'   => true,
                'title'     => 'Landing Page',
                'message'   => 'Added successfully'
            );
            return json_encode($response);
            // flash message
            Session::flash('success', 'Successfully Created.');
            return \redirect()->route('cms.landing-page-setup');
            // return json_encode($response);

        }

    }





    
    public function makeReadAll(Request $request)
    {
        // dd($request);
        if($request->type==1){
            Notification::where('type',1)->update(['read'=>date('Y-m-d h:i:s')]);
            redirect()->route('admin.claim.index');
        }elseif($request->type==0){
            Notification::whereNull('read')->update(['read'=>date('Y-m-d h:i:s')]);
        }
        
        $response = array(
            'success'  =>true,
            'title'=>'Notification',
            'message'  => 'Read successfully'
        );
        return json_encode($response);

       
    }

    
}
