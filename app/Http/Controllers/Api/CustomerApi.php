<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Traits\Common;
use Illuminate\Http\Request;
use Modules\Cms\Entities\Post;
use Illuminate\Support\Facades\DB;
use Modules\Cms\Entities\HowItWork;
use Modules\Expert\Entities\Expert;
use App\Http\Controllers\Controller;
use Modules\Cms\Entities\CmsSetting;
use Modules\Cms\Entities\Testimonial;
use Modules\Cms\Entities\PostCategory;
use Laravel\Socialite\Facades\Socialite;
use Modules\Customer\Entities\Customers;
use Illuminate\Support\Facades\Validator;
use Modules\Cms\Entities\TeamMembers;
use Modules\Subcription\Entities\Package;
use Modules\Subcription\Entities\Pricing;
use Modules\Expert\Entities\ExpertCategory;
use Modules\Setting\Entities\PaymentMethods;
use Modules\Setting\Entities\PredefinedAnswer;
use Modules\Subcription\Entities\Subscription;
use Modules\Conversation\Entities\Conversations;
use Modules\Subcription\Entities\PackageInvoice;
use Modules\Subcription\Entities\SubscriptionPayment;
use Modules\Conversation\Entities\ConversationDetails;
use Modules\Customer\Entities\ContactQuery;
use Modules\Subcription\Entities\PackageInvoicePayment;

class CustomerApi extends Controller
{
    use Common;

    public function landingPage(Request $request){

        $CmsSetting = CmsSetting::firstWhere('id',6);
        $dd = json_decode($CmsSetting?->details);
        $resposnse = [
            'status'    => true,
            'code'      => 200,
            'howitwork'   => HowItWork::select('image','btn_text','name','header','description')->get(),
            'data'      => $dd
        ];
        return response()->json($resposnse);
    }

    public function howitwork(Request $request)
    {
        $data = HowItWork::select('image','btn_text','name','header','description')->get();
        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }

    public function testimonials(Request $request)
    {
        $data = Testimonial::get();
        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }

    public function expertCategories(Request $request)
    {

        $data = ExpertCategory::select('name','id','icon_path','image_path','is_active')
        ->with(['page'=>function ($page) {
            $page->where('type', 1);
        },
        'ExpertSubCategory','pricing'])
        ->withCount(['onlineUser'=>function($onlineUser){
            $onlineUser->where('online_status','=','active');
        }])
        ->Filter($request)->get();

        
        if(!empty($request->category_id)){
            $customer_satisfied  = Conversations::where('expert_category_id',$request->category_id)->where('is_customer_closed',1)->count();
        }else{
            $customer_satisfied = 0;
        }

        $resposnse = [
            'status'            => true,
            'code'              => 200,
            'membership_info'   => "Answers from Experts in minutes, 24/7 | Global travel protection to assist your family on trips | Personalized financial guidance on your budget, savings, and goals",
            'customer_satisfied'         => $customer_satisfied,
            'data'              => $data
        ];

        return response()->json($resposnse);

        // return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }

    public function topExperts(Request $request)
    {
        $limit = $request->limit?$request->limit:12;
        $data = Expert::with(['category:id,name', 'subCategory:id,name'])->withCount(['conversations as rating_count' => function ($query) {
            $query->whereNotNull('rating');
        }])->where(['status'=>1])->orderBy('rank_no','DESC')->limit($limit)->get();
        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }



    public function categoriyWaisExpert(Request $request)
    {
        $data = Expert::where(['status'=>1,'category_id'=>$request->category_id])->get();

        $cat = ExpertCategory::with(
            ['page'=>function ($page) { $page->where('type', 1);}]
            )->where('id',$request->category_id)->first();
        $resposnse = [
            'status'    => true,
            'code'      => 200,
            'page_info'   => $cat->page,
            'data'      => $data
        ];
        return response()->json($resposnse, 200);
    }

    public function packageList(Request $request)
    {
        $data = Pricing::with('category')->get();
        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }


    public function packageDetails(Request $request)
    {
        $id = $request->id;
        $data = Pricing::with('category')->where(['id'=>$id])->first();
        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }


    public function myPackages(Request $request)
    {

        $info =  $this->customerinfo(auth('jwt_auth')->user()->id);
        $subscription = Subscription::with(['category'])->where(['customer_id'=>$info?->customer->id])->orderBy('id','DESC')->get();
        return sendSuccessResponse('Data Retrive Successfull !',$subscription,200);

    }



    public function myPackageDetails(Request $request)
    {

        $info =  $this->customerinfo(auth('jwt_auth')->user()->id);
        $request['customer_id'] = $info?->customer->id;
        $subscription_details = Subscription::with(['category'])->CheckFiltter($request)->first();

        if(!empty($subscription_details)){
            return sendSuccessResponse('Data Retrive Successfull !',$subscription_details,200);
        }else{
            return sendErrorResponse('You have no subscription', '', 400);
        }

    }


    public function cancelSubscription(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'subscription_id'           => 'required'
        ]);

        if ($validator->fails()) {
            return sendErrorResponse($validator->errors()->first(), $validator->errors(), 400);
        }

        $info   =  $this->customerinfo(auth('jwt_auth')->user()->id);
        $request['customer_id'] = $info?->customer->id;

        $subscription = Subscription::CheckFiltter($request)->first();

        if($subscription->stripe_subs_id!=''){
            $this->subscriptionCancelToStripe($subscription->stripe_subs_id);
        }

        $updatedata['status'] = 0;
        $subscription->update($updatedata);

        return sendSuccessResponse('Subscribtion Canceled !','',200);

    }

    public function customerPaymentIntents(Request $request){

        $validator = Validator::make($request->all(), [
            'category_id'           => 'required'
        ]);

        if ($validator->fails()) {
            return sendErrorResponse($validator->errors()->first(), $validator->errors(), 400);
        }


        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $pricing = Pricing::where('category_id',$request->category_id)->first();
        if(empty($pricing)){
            return sendErrorResponse('There is no price set in the category, Please try another', '', 400);
        }

        $intent =  $stripe->paymentIntents->create([
            'amount'                => 100*$pricing->trial_price,
            'currency'              => 'usd',
            "automatic_payment_methods"=> [ "enabled"=> true]
        ]);
        return sendSuccessResponse('Stripe Payment Intents API',$intent,200);

    }


    public function buyPackage(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'category_id'           => 'required',
            'payment_method_id'     => 'required',
            'token'                 => 'required',
        ]);
        if ($validator->fails()) {
            return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }
        $info =  $this->customerinfo(auth('jwt_auth')->user()->id);

        // $subdata = Subscription::where(['customer_id'=>$info?->customer->id,'category_id'=>$request->category_id,'status'=>1])->count();
        // if($subdata>0){
        //     return sendErrorResponse('You already bought this category, Please try another', '', 400);
        // }


        $pricing = Pricing::where('category_id',$request->category_id)->first();
        if(empty($pricing)){
            return sendErrorResponse('There is no price set in the category, Please try another', '', 400);
        }

        if($request->payment_method_id==2){
            $result = $this->checkStripPayment($request->token,$pricing,$info);
        }


        if($result->status==false){
            return sendErrorResponse($result->message, '', 400);
        }


        $sbdata = new Subscription();

        $sbdata->stripe_subs_id    = @$result->subs_id;
        $sbdata->subscription_id   = uniqueId('subscriptions','SUBS-');
        $sbdata->category_id       = $pricing->category_id;
        $sbdata->customer_id       = $info?->customer->id;
        $sbdata->invoice_date      = date('Y-m-d');
        $sbdata->recurring_invoice_date = date('Y-m-d', strtotime("+$pricing->recurring_day day"));
        $sbdata->trial_day         = @$pricing->trial_day;
        $sbdata->trial_price       = $pricing->trial_price;
        $sbdata->recurring_day     = @$pricing->recurring_day;
        $sbdata->recurring_price   = $pricing->recurring_price;
        $sbdata->status            = 1;


        if($sbdata->save()){

            $invoicePayment = new SubscriptionPayment();
            $invoicePayment->stripe_ch_id       = @$result->ch_id;
            $invoicePayment->payment_method_id  = $request->payment_method_id;
            $invoicePayment->total_amount       = $sbdata->trial_price;
            $invoicePayment->subscription_id    = $sbdata->id;
            $invoicePayment->invoice_id         = uniqueId('subscription_payments','INV-');
            $invoicePayment->category_id        = $pricing->category_id;
            $invoicePayment->customer_id        = $info?->customer->id;
            $invoicePayment->received_date      = date('Y-m-d');
            $invoicePayment->payment_type       = 1;
            $invoicePayment->save();

            if($invoicePayment){

                Subscription::where('customer_id',$info?->customer->id)->update(['status'=>0]);
                Subscription::where('customer_id',$info?->customer->id)->where('id',$sbdata->id)->update(['status'=>1]);

                $pdf = $this->sentInvoiceByMail($sbdata->subscription_id);
                SubscriptionPayment::where('id',$invoicePayment->id)->update(['inv_pdf'=>$pdf]);

            }

        }

        
        return sendSuccessResponse('Package Buy Successfull !','',200);

    }


    public function checkEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return sendErrorResponse($validator->errors()->first(), $validator->errors(), 400);
        }
        $data = User::select('email')->where(['email'=>$request->email,'user_type'=>4])->first();
        if($data?->email){
            return sendSuccessResponse('Email Exist',$data,200);
        }else{
            return sendErrorResponse('Email Not Exist', '', 400);
        }
    }



    public function checkToken(Request $request)
    {
        return sendSuccessResponse('Authoraized','',200);
    }


    public function blogPost(Request $request)
    {

        $limit = $request->limit??12;
        $page_number = $request->page_number??0;
        $offset = $page_number*$limit;


        if($request->keyword!=''){
            $keyword = $request->keyword;
            $posts = Post::when($keyword, function ($q) use ($keyword) {
                return $q->where('title', 'LIKE', '%' . $keyword . '%');;
            })->Postfilter($request)
            ->with('user','category')->offset($offset)->limit($limit)->orderBy('id','DESC')->get();
        }else{
            $posts  = Post::with('user','category')->Postfilter($request)->offset($offset)->limit($limit)->orderBy('id','DESC')->get();
        }

        $resposnse = [
            'status'    => true,
            'code'      => 200,
            'limit'     => 12,
            'total_post' => Post::Postfilter($request)->count(),
            'data'       => $posts
        ];
        return response()->json($resposnse);

        // return sendSuccessResponse('Data Retrive Successfull !',$posts,200);
    }

    public function blogPostDetails(Request $request)
    {
        $id = $request->id;
        $data = Post::with('user','category')->where(['id'=>$id])->first();
        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }

    public function blogCategory()
    {
        // $data = PostCategory::orderBy('id','DESC')->get();
        $data    = PostCategory::withCount('posts')->get();
        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }


    public function getRequest($token){

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.googleapis.com/oauth2/v1/tokeninfo?access_token='.$token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;

    }


    public function checkGmailLogin(Request $request){

        $validator = Validator::make($request->all(), [
            'token' => 'required',
        ]);

        if ($validator->fails()) {
           return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }

        $getInfo = json_decode($this->getRequest($request->token));

        if (@$getInfo->error) {
            return sendErrorResponse('Invalid Token', '', 400);
        }

        $existusers =  User::where(['email' => $getInfo->email])->first();

        if($existusers){

            $token = auth()->guard('jwt_auth')->login($existusers);

            if (!$token) {
                $data='';
                return sendErrorResponse('Check Your Email Or Password',$data=null,401);
            }

            $data =[
                'access_token'  => $token,
                'token_type'    => 'bearer',
                'expires_in'    => auth()->guard('jwt_auth')
            ];
            return sendSuccessResponse('Login Successfull!',$data,200);


        }else{

            try {

                DB::beginTransaction();

                    $name = explode('@',$getInfo->email);

                    $user = User::create([
                        'name'      => @$name[0],
                        'user_name' => @$name[0],
                        'email'     => $getInfo->email,
                        'google_id'     => $getInfo->user_id,
                        'password'  => '',
                        'user_type'  => 4,
                        'status'  => 'Active',
                    ]);

                    $data['user_id']        = $user->id;
                    $data['code']           = uniqueId('customers','CUS');
                    $data['name']           = @$name[0];
                    $data['email']          = $getInfo->email;

                    Customers::create($data);

                    $token = auth()->guard('jwt_auth')->login($user);


                    $dataLogin =[
                        'access_token'  => $token,
                        'token_type'    => 'bearer',
                        'expires_in'    => auth()->guard('jwt_auth')
                    ];


                DB::commit();

                return sendSuccessResponse('Login Successfull!',$dataLogin,200);

            } catch( \Exception $e){
                DB::rollback();
                return sendErrorResponse($e->getMessage(),'Something Went Wrong!',500);
            }
        }
    }

    public function paypalAccount() {
        $data = $this->paypalMerchentAccount();
        return sendSuccessResponse('Paypal Account!',$data,200);
    }

    public function paymentMethod() {
        $data = PaymentMethods::select('id','name','client_id')->where('is_active',1)->get();
        return sendSuccessResponse('Payment Methods Data',$data,200);
    }

    public function predefinedAnswer(Request $request) {

        $category_id = $request->category_id;

        if($request->category_id){

            $info = PredefinedAnswer::with('category')->where('category_id',$category_id)->first();

            $data = (object)[
                'answer_one'    => $info->answer_one,
                'answer_two'    => $info->answer_two,
                'answer_three'  => $info->answer_three,
                'answer_four'   => $info->answer_four,
                'answer_five'   => $info->answer_five
            ];

            $resposnse = [
                'status'            => true,
                'code'              => 200,
                'category_id'       => $info->category_id,
                'category_name'     => $info?->category?->name,
                'data'              => $data
            ];
            return response()->json($resposnse);



            // return sendSuccessResponse('Predefined Answer!',$data,200);

        }else{
            $data = PredefinedAnswer::with('category')->get();
            return sendSuccessResponse('Predefined Answer!',$data,200);
        }

    }

    public function consultantHstory(Request $request)
    {

        $limit = $request->limit??12;
        $page_number = $request->page_number??0;
        $offset = $page_number*$limit;

        $userinfo = $this->customerinfo(auth('jwt_auth')->user()->id);

        $data = Conversations::with('expert','expert_category')->where('customer_id',$userinfo?->id)
        ->offset($offset)->orderBy('id', 'DESC')->limit($limit)->get();

        $resposnse = [
            'status'    => true,
            'code'      => 200,
            'limit'     => 12,
            'total' => Conversations::where('customer_id',$userinfo?->id)->count(),
            'data'       => $data
        ];
        return response()->json($resposnse);
        // return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }


    public function consultantDetails(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'conversetion_id' => 'required'
        ]);
        if ($validator->fails()) {
            return sendErrorResponse($validator->errors()->first(), $validator->errors(), 400);
        }

        $userinfo = $this->customerinfo(auth('jwt_auth')->user()->id);

        $conversetion_id =  $request->conversetion_id;
        $conversetion = Conversations::where('customer_id',$userinfo?->id)->where('id',$conversetion_id)->first();

        $data = ConversationDetails::with('customer_receiver_data','expert_receiver_data')->where('conversation_id',$conversetion_id)->get();


        $resposnse = [
            'status'    => true,
            'code'      => 200,
            'is_close'   => $conversetion->is_customer_closed??0,
            'data'      => $data
        ];
        return response()->json($resposnse);

        // return sendSuccessResponse('Data Retrive Successfull !',$data,200);

    }

    public function paymentHistory()
    {
        $userinfo = $this->customerinfo(auth('jwt_auth')->user()->id);
        $datas = SubscriptionPayment::with(['category'])->where('customer_id',$userinfo?->customer?->id)->get();

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        
        // $data['data'] = $subscription;
        // $data['card'] = $detail->payment_method_details->card;
        // return response()->json($data);


        foreach ($datas as $key => $item) {

            $data[$key]['id']        = $item->id;
            $data[$key]['subscription_id']        = $item->subscription_id;
            $data[$key]['stripe_ch_id']      = $item->stripe_ch_id;
            $data[$key]['invoice_id']    = $item->invoice_id;
            $data[$key]['customer_id']     = $item->customer_id;
            $data[$key]['category_id']        = $item->category_id;
            $data[$key]['payment_method_id']      = $item->payment_method_id;
            $data[$key]['total_amount']     = $item->total_amount;
            $data[$key]['payment_type']     = $item->payment_type;
            $data[$key]['received_date']     = $item->received_date;
            $data[$key]['inv_pdf']     = $item->inv_pdf;
            $data[$key]['category']     = $item->category;
            if(@$item->stripe_ch_id){
                $spayment = $stripe->charges->retrieve($item->stripe_ch_id);
                $data[$key]['card'] = @$spayment->payment_method_details->card;
            }else{
                $data[$key]['card'] = null;
            }
            
        }

        return sendSuccessResponse('Data Retrive Successfull !',$data,200);
    }

    public function aboutUs()
    {
        return response()->json([
            'success' => true,
            'data' => [
                'title' => setting('about.title'),
                'description' => setting('about.about_des'),
                'body_title' => setting('about.about_body_title'),
                'body_description' => setting('about.about_body_des'),
                'features' => [
                    setting('about.about_feature_1'),
                    setting('about.about_feature_2'),
                    setting('about.about_feature_3'),
                    setting('about.about_feature_4'),
                ],
                'total_experts'     => Expert::count(),
                'total_customer'    => Customers::count(),
                'categories'        => ExpertCategory::count(),
                'total_users'       => User::count(),
                'team' => [
                    'title'         => setting('team.title'),
                    'description'   => setting('team.description'),
                    'members'       => TeamMembers::where('is_active', true)->get()
                ]

            ]
        ]);
    }


    public function submitContactQuery(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required|max:1000'
        ]);

        if ($validator->fails()) {
            return sendErrorResponse($validator->errors()->first(), $validator->errors(), 400);
        }

        try {
            ContactQuery::create($request->all());
            return response()->json([
                'success' => true,
                'message' => 'We have received your queries will contact you soon'
            ]);
        } catch (\Throwable $th) {

            return response()->json([
                'success' => false,
                'message' => "Sorry getting issues. Please try after some time"
            ],400);
        }
    }







}
