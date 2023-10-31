<?php

namespace App\Http\Controllers\Api;

use App\Traits\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Modules\Cms\Entities\CmsSetting;
use Modules\Expert\Entities\ExpertCategory;
use Modules\Setting\Entities\Setting;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class SettingController extends Controller
{
    use Common;

    public function settings(Request $request) {
        try {

            $settings = Setting::all()->pluck('value','key');

            $settings['privacypolicy'] = $this->cmsSetting(3)?->privacypolicy;
            $settings['termsofservice'] = $this->cmsSetting(4)?->termsofservice;
            $settings['about_us'] = $this->cmsSetting(5)?->about_us;

            return sendSuccessResponse('Data Retrive Successfull !',$settings,200);

        } catch( \Exception $e){
            return sendErrorResponse($e->getMessage(),'Something Went Wrong!',500);
        }
    }

    public function webSettings(Request $request) {


        try {

            // $settings = Setting::all()->pluck('value','key');

            $settings['fb_login']      = $this->cmsSetting(7);
            $settings['gl_login']      = $this->cmsSetting(8);
            $settings['web_setup']      = $this->cmsSetting(1);
            $settings['social_link']    = $this->cmsSetting(2);
            $settings['termsofservice'] = $this->cmsSetting(4)?->termsofservice;
            $settings['about_us']       = $this->cmsSetting(5)?->about_us;


            $settings['site_url']       = setting('team.title');

            $settings['contact'] = [
                'dialog'             => setting('contact.contact_dialog'),
                'dialog_description' => setting('contact.contact_dialog_des'),
                'map_url'            => setting('contact.contact_map_url')
            ];

            $settings['categories'] = ExpertCategory::select('id', 'name')->where('is_active', true)->orderBy('id', 'DESC')->take(4)->get();
            $settings['privacypolicy'] = $this->cmsSetting(3)?->privacypolicy;
            return sendSuccessResponse('Data Retrive Successfull !',$settings,200);


        } catch( \Exception $e){
            return sendErrorResponse($e->getMessage(),'Something Went Wrong!',500);
        }
    }

    public function country_list()
    {
        $data = DB::table('countries')->get();
        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }



}
