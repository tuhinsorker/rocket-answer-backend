<?php

namespace App\Http\Controllers\Api;

use App\Traits\Common;
use App\Models\Notificatios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Expert\Entities\Expert;
use App\Http\Controllers\Controller;
use App\Models\Notifications;
use Modules\Expert\Entities\ExpertJob;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Modules\Expert\Entities\ExpertCategory;
use Modules\Expert\Entities\ExpertDocument;
use Modules\Expert\Entities\ExpertEducations;
use Modules\Expert\Entities\ExpertPayAccount;
use Modules\Expert\Entities\PaymentTransaction;
use Modules\Conversation\Entities\Conversations;
use Modules\Conversation\Entities\Activity;
use Modules\Expert\Entities\ExpertWithdrawRequest;
use Modules\Conversation\Entities\ConversationDetails;

class ExpertApi extends Controller
{
    use Common;

    public function update_expert_info(Request $request){

        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'first_name' => 'required',
        ]);

        if ($validator->fails()) {
           return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }

        try {



            if(!empty(@$request->profile_photo_url)){
                //Upload File
                $destinationPath = 'uploads/';
                $image_parts = explode(";base64,", @$request->profile_photo_url);
                $image_type_aux = explode("image/", $image_parts[0]);
                $image_type = $image_type_aux[1];
                $image_base64 = base64_decode($image_parts[1]);
                $fileName =  uniqid().'.'.$image_type;

                Storage::put($destinationPath.$fileName, $image_base64);

                $expert['profile_photo_url'] = $destinationPath.$fileName;
                $request->profile_photo_url_old ? Storage::delete($request->profile_photo_url_old) : null;

            }


            $expert['category_id']      = $request->category_id;
            $expert['sub_category_id']  = $request->sub_category_id;
            $expert['email']            = $request->email;
            $expert['paypal_email']     = $request->paypal_email;
            $expert['full_name']        = $request->first_name.' '.$request->last_name;
            $expert['first_name']       = $request->first_name;
            $expert['last_name']        = $request->last_name;
            $expert['display_name']     = $request->display_name;
            $expert['dob']              = $request->dob;
            $expert['phone']            = $request->phone;
            $expert['country_id']       = $request->country_id;
            $expert['zip_code']         = $request->zip_code;
            $expert['state']            = $request->state;
            $expert['gender']           = $request->gender;
            $expert['address']           = $request->address;
            $expert['iso_code']           = $request->iso_code;
            $expert['phone_code']           = $request->phone_code;


            $user =  $this->expertinfo(auth('jwt_auth')->user()->id);
            $expert_id = $user->expert->id;

            Expert::where('id',$expert_id)->update($expert);
            return sendSuccessResponse('Update Successfull !','',200);


        } catch( \Exception $e){
            return sendErrorResponse('Something Went Wrong!','Something Went Wrong!',500);
        }

    }


    public function update_expert_education(Request $request){


        $validator = Validator::make($request->all(), [
            'expert_educations' => 'required|array',

        ]);

        if ($validator->fails()) {
           return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }

        try {

            $jsonData = json_encode($request->all());
            $arrayData = json_decode($jsonData,true);
            $user =  $this->expertinfo(auth('jwt_auth')->user()->id);
            $expert_id = $user->expert->id;

            foreach ($arrayData['expert_educations'] as $key => $val) {

                $expert_educations['expert_id'] = $expert_id;
                $expert_educations['degree'] = $val['degree'];
                $expert_educations['pass_year'] = $val['pass_year'];
                $expert_educations['institute_name'] = $val['institute_name'];

                if($val['id']!=''){
                    ExpertEducations::where('id',$val['id'])->update($expert_educations);
                }else{
                    ExpertEducations::create($expert_educations);
                }
            }


            return sendSuccessResponse('Update Successfull !','',200);


        } catch( \Exception $e){
            return sendErrorResponse($e->getMessage(),'Something Went Wrong!',500);
        }

    }


    public function update_expert_document(Request $request){


        $validator = Validator::make($request->all(), [
            'expert_document' => 'required|array',
        ]);

        if ($validator->fails()) {
           return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }

        try {

            $user =  $this->expertinfo(auth('jwt_auth')->user()->id);
            $expert_id = $user->expert->id;

            $jsonData = json_encode($request->all());
            $arrayData = json_decode($jsonData,true);

            $expert_document = [];
            foreach ($arrayData['expert_document'] as $key => $val) {

                $doc_path = '';
                if(!empty($val['doc_path'])){
                    $destinationPath = 'doc/';
                    $image_parts = explode(";base64,", @$val['doc_path']);
                    $image_type_aux = explode("image/", $image_parts[0]);
                    $image_type = $image_type_aux[1];
                    $image_base64 = base64_decode($image_parts[1]);
                    $fileName =  uniqid().'.'.$image_type;
                    Storage::put($destinationPath.$fileName, $image_base64);
                    $doc_path = $destinationPath.$fileName;
                }

                // $expert_document['expert_id'] = $expert_id;
                // $expert_document['doc_type_id'] = $val['doc_type_id'];
                // $expert_document['doc_number'] = $val['doc_number'];
                // $expert_document['doc_valid_date'] = $val['doc_valid_date'];

                

                if($val['id']!=''){
                    $doc = ExpertDocument::find($val['id']);
                    $doc->expert_id = $expert_id;
                    $doc->doc_type_id = $val['doc_type_id'];
                    $doc->doc_number = $val['doc_number'];
                    $doc->doc_valid_date = $val['doc_valid_date'];
                    if($doc_path){
                        $doc->doc_path = $doc_path;
                    }
                    $doc->update();
                    // ExpertDocument::where('id',$val['id'])->update($expert_document);
                }else{
                    $doc = new ExpertDocument();
                    $doc->expert_id = $expert_id;
                    $doc->doc_type_id = $val['doc_type_id'];
                    $doc->doc_number = $val['doc_number'];
                    $doc->doc_valid_date = $val['doc_valid_date'];
                    if($doc_path){
                        $doc->doc_path = $doc_path;
                    }
                    $doc->save();

                    // ExpertDocument::create($expert_document);
                }

                $expert_document['doc_path'] = '';

            }

            return sendSuccessResponse('Update Successfull !','',200);


        } catch( \Exception $e){
            return sendErrorResponse($e->getMessage(),'Something Went Wrong!',500);
        }

    }



    public function update_expert_job(Request $request){


        $validator = Validator::make($request->all(), [
            'expert_job' => 'required|array',
        ]);

        if ($validator->fails()) {
           return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }

        try {

            $jsonData = json_encode($request->all());
            $arrayData = json_decode($jsonData,true);

            $user =  $this->expertinfo(auth('jwt_auth')->user()->id);
            $expert_id = $user->expert->id;

            // $expert_job    = $request->expert_job;


            foreach ($arrayData['expert_job'] as $key => $val) {
                $expert_job['expert_id'] = $expert_id;
                $expert_job['company_name'] = $val['company_name'];
                $expert_job['designation'] = $val['designation'];
                $expert_job['start_date'] = $val['start_date'];
                $expert_job['end_date'] = $val['end_date'];
                $expert_job['employer_name'] = $val['employer_name'];
                $expert_job['employer_number'] = $val['employer_number'];
                $expert_job['is_continue'] = $val['is_continue'];

                if($val['id']!=''){
                    ExpertJob::where('id',$val['id'])->update($expert_job);
                }else{
                    ExpertJob::create($expert_job);
                }
            }




            return sendSuccessResponse('Update Successfull !','',200);


        } catch( \Exception $e){
            return sendErrorResponse($e->getMessage(),'Something Went Wrong!',500);
        }

    }


    public function country_list()
    {
        $data = DB::table('countries')->get();
        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }

    public function expert_categories()
    {
        $data = ExpertCategory::with('ExpertSubCategory')->get();
        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }

    public function doc_type()
    {
        $data = DB::table('doc_types')->where('is_active',1)->get();
        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }

    public function card_type()
    {
        $data = DB::table('card_types')->get();
        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }

    public function pay_accounts(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'card_type_id'          => ['required'],
            'payment_method_id'     => ['required'],
            'email'                 => ['required', 'string'],
            'name'                  => ['required', 'string'],
            'card_number'           => ['required'],
            'valid_date'            => ['required'],
        ]);


        if ($validator->fails()) {
            return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }

        $userinfo = $this->expertinfo(auth('jwt_auth')->user()->id);

        $data = ExpertPayAccount::where('expert_id',$userinfo->expert->id)->first();

        try {

            $request_data = $request->all();

            if($data){
                ExpertPayAccount::where('expert_id',$userinfo->expert->id)->update($request_data);

            }else{
                $request_data['expert_id'] = $userinfo->expert->id;
                ExpertPayAccount::create($request_data);
            }
            return sendSuccessResponse('Payment Account Update Successfull !',$request_data,200);

        } catch( \Exception $e){
            return sendErrorResponse($e->getMessage(),'Something Went Wrong!',500);
        }
    }


    public function pay_account_info()
    {
        $userinfo = $this->expertinfo(auth('jwt_auth')->user()->id);
        $data = ExpertPayAccount::with('cardtype','payment_method')->where('expert_id',$userinfo?->expert?->id)->first();
        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }


    public function payment_methods()
    {
        $data = DB::table('payment_methods')->get();


        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }



    public function withdraw_request(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'request_amount'        => ['required'],
            'paypal_email'          => ['required'],
        ]);


        if ($validator->fails()) {
            return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }

        $userinfo = $this->expertinfo(auth('jwt_auth')->user()->id);

        try {

            $request_data = $request->all();

            $request_data['code'] = uniqueId('expert_withdraw_requests','EWR-');
            $request_data['expert_id'] = $userinfo->id;
            $request_data['request_date'] = date('Y-m-d');
            ExpertWithdrawRequest::create($request_data);

            return sendSuccessResponse('Withdraw Request Successfull !',$request_data,200);

        } catch( \Exception $e){
            return sendErrorResponse($e->getMessage(),'Something Went Wrong!',500);
        }

    }

    public function withdraw_request_list()
    {
        $userinfo = $this->expertinfo(auth('jwt_auth')->user()->id);
        $data = ExpertWithdrawRequest::with('cardtype')->where('expert_id',$userinfo?->id)->orderBy('id','desc')->get();
        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }


    public function withdraw_request_details(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'        => ['required']
        ]);

        if ($validator->fails()) {
            return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }

        $userinfo = $this->expertinfo(auth('jwt_auth')->user()->id);
        $data = ExpertWithdrawRequest::with('cardtype')->where(['id'=>$request->id,'expert_id'=>$userinfo?->id])->first();
        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }


    public function conversetion()
    {
        $userinfo = $this->expertinfo(auth('jwt_auth')->user()->id);
        $data   = Conversations::with('customer')->orderBy('id', 'DESC')->where('expert_id',$userinfo?->id)->get();
        // $data = Activity::with('customer')->where('expert_id',$userinfo?->id)->get();
        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }

    public function conversetion_details(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'conversetion_id' => 'required'
        ]);

        if ($validator->fails()) {
            return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }

        $conversetion_id =  $request->conversetion_id;

        $data = ConversationDetails::with('customer_receiver_data','expert_receiver_data')->where('conversation_id',$conversetion_id)->get();

        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }


    public function top_customers(Request $request){

        $userinfo = $this->expertinfo(auth('jwt_auth')->user()->id);
        $limit = $request->limit?$request->limit:10;
        $data =  Conversations::with('customer','customer.country')
        ->select('customer_id', DB::raw('count(*) as total'))
        ->where('expert_id',$userinfo->id)
       ->groupBy('customer_id')->orderBy('total','desc')->limit($limit)->get();

        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }


    public function dashboard(){

        $userinfo = $this->expertinfo(auth('jwt_auth')->user()->id);
        $data = $this->expertBalanceInfo($userinfo?->id,$userinfo?->expert?->category_id);


        return sendSuccessResponse('Data Retrive Successfull !',$data,200);

    }


    public function expert_payment_setup(){

        $userinfo = $this->expertinfo(auth('jwt_auth')->user()->id);
        $data = $this->expertPaymentSetup($userinfo?->expert?->id,$userinfo?->expert?->category_id);

        return sendSuccessResponse('Data Retrive Successfull !',$data,200);

    }


    public function online_offline(Request $request){

        $userinfo = $this->expertinfo(auth('jwt_auth')->user()->id);

        $validator = Validator::make($request->all(), [
            'online_status' => 'required'
        ]);

        if ($validator->fails()) {
            return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }

        Expert::where('id',$userinfo?->expert?->id)->update(['online_status'=>$request->online_status]);
        
        return sendSuccessResponse('Status Change Successfull',$request->online_status,200);
    }


    public function transections(Request $request){

        $userinfo = $this->expertinfo(auth('jwt_auth')->user()->id);
        $limit = $request->limit?$request->limit:10;
        $data =  PaymentTransaction::where('expert_id',$userinfo?->id)->orderBy('id','desc')->limit($limit)->get();

        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }


    public function notifications(Request $request){

        $limit = $request->limit ? $request->limit : 10;
        if($request->notification_type == 3){
            $data =  Notifications::orderBy('id','desc')->where('is_read',false)
            ->where([
                'expert_id' => auth()->user()->id,
                'type' => $request->notification_type
            ])->paginate($limit);
        }else{

            $data =  Notifications::orderBy('id','desc')
            ->with('conversation.customer')
            ->where([
                'is_read' => false,
                'expert_id' => auth()->user()->id,
                'type' => $request->notification_type
            ])->paginate($limit);
        }

        return response()->json([
            'status' => true,
            'code' => 200,
            "message" => "Data Retrive Successfull !",
            'data' => $data->items(),
            'paginate' => [
                'total' => $data->total(),
                'per_page' => $data->perPage(),
                'current_page' => $data->currentPage(),
                'last_page' => $data->lastPage(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem(),
                'prev_url' => $data->previousPageUrl(),
                'next_url' => $data->nextPageUrl(),
            ]
        ],200);
    }

    public function getTotalUnreadNotificationCount(){
        $data = Notifications::orderBy('id','desc')->where('seen_total',false)->where('expert_id',auth()->user()->id)->count();
        return sendSuccessResponse('Data Updated Successfull !',$data,200);
    }

    public function notificationSeenAllTotal(){

        $data = Notifications::where('expert_id',auth()->user()->id)->update(['seen_total'=>true]);
        return sendSuccessResponse('Data Updated Successfull !',$data,200);
    }

    public function readAllNotification(Request $request){

        // $validator = Validator::make($request->all(), [
        //     'type' => 'in:1,2,3'
        // ]);

        // if ($validator->fails()) {
        //     return sendErrorResponse($validator->errors()->first(), $validator->errors()->all(), 400);
        // }

        $data = Notifications::where('expert_id',auth()->user()->id);

        if($request->type == 3){
            $data = $data->where('type',$request->type);
        }
        if($request->type == 1 || $request->type == 2){
            $data = $data->whereIn('type',[1,2]);
        }

        $data = $data->update(['is_read'=>true]);
        return sendSuccessResponse('Data Updated Successfull !',$data,200);
    }

    public function makeNotificationRead($id){

        // make notification read

        $notification = Notifications::where('id',$id)->first();

        if(!$notification){
            return sendErrorResponse('Notification Not Found !',[],400);
        }

        Notifications::where('id',$id)->update(['is_read'=>1]);
        return sendSuccessResponse('Data Updated Successfull !',[],200);
    }



}
