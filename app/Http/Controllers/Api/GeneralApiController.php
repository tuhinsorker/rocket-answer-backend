<?php

namespace App\Http\Controllers\Api;

use Stripe\Stripe;
use Stripe\Webhook;
use App\Models\User;
use App\Traits\Common;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Modules\Expert\Entities\ExpertReview;
use Modules\Subcription\Entities\Subscription;
use Modules\Expert\Entities\PaymentTransaction;
use Modules\Conversation\Entities\Conversations;
use Modules\Customer\Entities\Customers;
use Modules\Subcription\Entities\Pricing;
use Modules\Expert\Entities\ExpertCategory;
use Modules\Subcription\Entities\SubscriptionPayment;

class GeneralApiController extends Controller
{

    use Common;

    public function uploadFile(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'file' => 'required',
            'type' => 'required|string|in:image,video,pdf,file',
        ]);


        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->messages()
            ], 415);
        }

        try {
                $file = $request->file('file');
                $mime = $file->extension();
                $base = time() . rand(10000, 99999999);
                $filename = $base . '.' . $mime;
                $path = 'file_upload/' . $filename;
                $response = Storage::put($path, file_get_contents($file));


                return sendSuccessResponse('File Uploaded Successfully',
                [
                    'file_name' => $filename,
                    'file_path' => $path,
                    'file_mime' => $mime,
                    'file_url' => Storage::url($path)
                ],200);

            }
            catch (\Exception $exception) {
                return sendErrorResponse($exception->getMessage(),[], 400);
        }
    }


    public function experCustomerDetail(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'conversation_id' => 'required'
        ]);


        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->messages()
            ], 415);
        }

        try {

            $conversession = Conversations::where('id',$request->conversation_id)->first();

            $data['expert'] =  DB::table('experts') ->where('user_id', $conversession->expert_id)->first();

            $data['customer'] =  DB::table('customers') ->where('user_id', $conversession->customer_id)->first();

            return sendSuccessResponse('user details',$data,200);

        }catch (\Exception $exception) {
            return sendErrorResponse($exception->getMessage(),[], 400);
        }
    }



    public function closeActivity(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'conversation_id' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->messages()
            ], 415);
        }
        try {

            $expert_id = auth('jwt_auth')->user()->id;
            $conversession = Conversations::where(['id'=>$request->conversation_id,'expert_id'=>$expert_id])->first();

            if(! $conversession){
                return sendErrorResponse('Conversession Not Found',[], 400);
            }
            if($conversession->is_customer_closed==1){
                return sendErrorResponse('This conversession already closed',[], 400);
            }

            Conversations::where('id',$request->conversation_id)->update(['is_expert_closed'=>1,'end_date' => date('Y-m-d'), 'end_time' => date('H:i:s')]);
            return sendSuccessResponse('Closed',[],200);

        }catch (\Exception $exception) {
            return sendErrorResponse($exception->getMessage(),[], 400);
        }

    }


    public function closeActivityByCustomer(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'conversation_id' => 'required'
        ]);


        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->messages()
            ], 415);
        }

        try {
            $customer_id = auth('jwt_auth')->user()->id;
            $conversession = Conversations::where(['id'=>$request->conversation_id,'customer_id'=>$customer_id])->first();

            if(! $conversession){
                return sendErrorResponse('Conversations Not Found',[], 400);
            }




            if(@$request->rating){

                if($conversession->rating>0){
                    return sendErrorResponse('You have already rating this Conversations',[], 400);
                }

                $checkExis = Conversations::where(
                    ['customer_id'=>$conversession->customer_id,
                    'expert_id'=>$conversession->expert_id
                    ])->whereNotIn('id', [$request->conversation_id])->count();


                $expert_wise_payment = DB::table('expert_payment_setups')->where('expert_id',$conversession->expert_id)->first();
                $expert_cat_wise_payment = DB::table('expert_categories')->where('id',$conversession->expert_category_id)->first();
                // $price = DB::table('pricings')->where('category_id',$conversession->expert_category_id)->first();

                //expert wise payment
                if($expert_wise_payment){

                    if($expert_wise_payment->raging<=$request->rating){

                        if($checkExis>0){
                            // $payment = ($price->recurring_price*$expert_wise_payment->second_pay_amount)/100;
                            $payment =$expert_wise_payment->second_pay_amount;

                        }else{
                            $payment = $expert_wise_payment->pay_amount;
                        }
                        if($this->add_expert_balance($conversession->expert_id,$payment)){
                            $this->add_payment_transection($conversession,$payment);
                        }
                    }

                //expert category wise payment
                }else if($expert_cat_wise_payment->payment_amount>0){

                    if($expert_cat_wise_payment->rating_range<=$request->rating){

                        if($checkExis>0){
                            // $payment = ($price->recurring_price*$expert_cat_wise_payment->second_pay_amount)/100;
                            $payment = $expert_cat_wise_payment->second_pay_amount;

                        }else{
                            $payment = $expert_cat_wise_payment->payment_amount;
                        }

                        if($this->add_expert_balance($conversession->expert_id,$payment)){
                            $this->add_payment_transection($conversession,$payment);
                        }
                    }

                //expert default payment
                }else{

                    $default_payment = DB::table('default_payment_setups')->first();
                    if($default_payment->rating_range<=$request->rating){

                        if($checkExis>0){
                            // $payment = ($price->recurring_price*$default_payment->second_pay_amount)/100;
                            $payment = $default_payment->second_pay_amount;

                        }else{
                            $payment = $default_payment->payment_amount;
                        }

                        if($this->add_expert_balance($conversession->expert_id,$default_payment->payment_amount)){
                            $this->add_payment_transection($conversession,$default_payment->payment_amount);
                        }
                    }
                }


                ExpertReview::create([
                    'rating'             => $request->rating,
                    'conversation_id'    => $request->conversation_id,
                    'expert_id'          => $conversession->expert_id,
                    'customer_id'        => $conversession->customer_id,
                    'review'             => $request->review_text??'',
                ]);


            }

            $cloasedata = array(
                'rating'             => @$request->rating,
                'is_customer_closed' => 1,
                'end_time'           => date('H:i:s'),
                'end_date'           => date('Y-m-d')
            );

            Conversations::where('id',$request->conversation_id)->update($cloasedata);

            return sendSuccessResponse('Successfully closed your conversession, Thank you for with us','',200);


        }catch (\Exception $exception) {
            return sendErrorResponse($exception->getMessage(),[], 400);
        }
    }





    public function add_expert_balance($expert_id,$pay_amount){

        $expert_balance = DB::table('expert_balances')->where('expert_id',$expert_id)->first();
        if($expert_balance){
            $balance['balance'] = $expert_balance->balance+$pay_amount;
            $expert_balance = DB::table('expert_balances')->where('expert_id',$expert_id)->update($balance);
        }else{
            $balance['expert_id'] = $expert_id;
            $balance['balance'] = $pay_amount;
            $expert_balance = DB::table('expert_balances')->insert($balance);
        }
        return true;
    }


    public function add_payment_transection($conversession,$pay_amount){

        $info = PaymentTransaction::create([
            'code'                          => uniqueId('payment_transactions','TRN-'),
            'conversation_id'               => $conversession->id,
            'expert_id'                     => $conversession->expert_id,
            'amount'                        => $pay_amount,
            'transaction_type'              => 1,
            'payment_date'                  => date('Y-m-d')
        ]);

        $data = [
            'type'=>3,
            'expert_id'=>$conversession->expert_id,
            'payment_transaction_id'=>$info->id,
            'title'=>'Your balance is debited',
            'body'=>'Your balance is debited from conversation',
        ];
        $this->notification($data);

        set_push_notification('Balance credited','You have received', (int) $conversession->expert_id);
    }



    // 0 0 * * * curl http://24.199.122.48/api/general/create_stripe_subscription
    public function create_stripe_subscription(Request $request){

        $newdata = Subscription::where('recurring_invoice_date',date('Y-m-d'))->where('status',1)->get();

        $stripe = new StripeClient(env('STRIPE_SECRET'));

        foreach ($newdata as $key => $item) {

            $price = Pricing::where('category_id',$item->category_id)->first();
            $userinfo = Customers::where('id',$item->customer_id)->first();

            if(@$price->stripe_price_id){

                $subscription = $stripe->subscriptions->create([
                    'customer' => $userinfo->stripe_cus_id,
                    'items' => [
                        ['price' => @$price->stripe_price_id],
                    ],
                    'metadata' => [
                        'start_date' => date('Y-m-d')
                    ]
                ]);

                $invoicePayment = new SubscriptionPayment();
                // $invoicePayment->stripe_ch_id =  @$request->stripe_ch_id;
                $invoicePayment->payment_method_id =  2;
                $invoicePayment->total_amount =  $item->recurring_price;
                $invoicePayment->subscription_id =  $item->id;
                $invoicePayment->invoice_id =  uniqueId('subscription_payments','INV-');
                $invoicePayment->category_id = $item->category_id;
                $invoicePayment->customer_id = $item->customer_id;
                $invoicePayment->received_date =  date('Y-m-d');
                $invoicePayment->payment_type =  2;
                $invoicePayment->save();

                $sinfo = [
                    'recurring_invoice_date' => date('Y-m-d', strtotime("+$item->recurring_day day")),
                    'stripe_subs_id' => $subscription->id
                ];
                Subscription::where('id',$item->id)->update($sinfo);


            }

        }

        return sendSuccessResponse('Update successfull',[],200);

    }



    public function get_stripe_event (Request $request) {

        $stripe = new StripeClient(env('STRIPE_SECRET'));
        // This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = 'whsec_bZYt8XLQEDKpWHOrxfs0yO0HULrCjR68';
        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;


        try {

            $event = Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );

        } catch(\UnexpectedValueException $e) {

            return response()->json([
                'success' => false,
                'message' =>$e->getMessage()
            ],400);

        } catch(\Stripe\Exception\SignatureVerificationException $e) {

            return response()->json([
                'success' => false,
                'message' =>$e->getMessage()
            ],400);
        }

        $subscription_information = $stripe->customers->retrieve($event?->data?->object?->customer, [ 'expand' => ['subscriptions'] ]);


        // Handle the event
        switch ($event->type) {

            case 'charge.refunded':
                $charge = $event->data->object;
            case 'subscription_schedule.updated':

                // ... handle other event types
                $subscription = $stripe->subscriptions->update(
                    $subscription_information->subscriptions->data[0]->id,
                    []
                );


                if ($subscription) {

                    $info = Subscription::where('stripe_subs_id',$subscription->id)->first();

                    $invoicePayment = new SubscriptionPayment();
                    // $invoicePayment->stripe_ch_id =  @$request->stripe_ch_id;
                    $invoicePayment->payment_method_id =  2;
                    $invoicePayment->total_amount =  $subscription->plan->amount;
                    $invoicePayment->subscription_id =  $info->id;
                    $invoicePayment->invoice_id =  uniqueId('subscription_payments','INV-');
                    $invoicePayment->category_id = $info->category_id;
                    $invoicePayment->customer_id = $info->customer_id;
                    $invoicePayment->received_date =  date('Y-m-d');
                    $invoicePayment->payment_type =  2;
                    $invoicePayment->save();

                    $sinfo = ['recurring_invoice_date' => date('Y-m-d', strtotime("+$info->recurring_day day"))];
                    Subscription::where('stripe_subs_id',$subscription->id)->update($sinfo);

                }

            // ... handle other event types
            default:
                echo 'Received unknown event type ' . $event->type;
        }


    }



    public function updateCustomerPaymentMethod(Request $request){

        $validator = Validator::make($request->all(), [
            'pm_id' => 'required',
        ]);

        if ($validator->fails()) {
           return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }


        try {

            $stripe = new StripeClient(env('STRIPE_SECRET'));
            $userinfo = $this->customerinfo(auth('jwt_auth')->user()->id);

            // return $data->data[0]->id;

            $data = $stripe->customers->update(
                $userinfo?->customer?->stripe_cus_id,
                ['invoice_settings' => ['default_payment_method' => $request->pm_id]]
            );

            return sendSuccessResponse('Update successfull',[],200);



        } catch(\Exception $e) {

            return response()->json([
                'success' => false,
                'message' =>$e->getMessage()
            ],400);

        }

    }



    public function deleteCustomerPaymentMethod(Request $request){

        $validator = Validator::make($request->all(), [
            'pm_id' => 'required',
        ]);
        if ($validator->fails()) {
           return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }
        // $userinfo = $this->customerinfo(auth('jwt_auth')->user()->id);

        try {

            $stripe = new StripeClient(env('STRIPE_SECRET'));

            $stripe->paymentMethods->detach(
                $request->pm_id, []
            );

            return sendSuccessResponse('Payment method delete successfull',[],200);

        } catch(\Exception $e) {

            return response()->json([
                'success' => false,
                'message' =>$e->getMessage()
            ],400);

        }

    }


    public function addCustomerPaymentMethod(Request $request){

        $validator = Validator::make($request->all(), [
            'pm_id' => 'required',
        ]);

        if ($validator->fails()) {
           return sendErrorResponse($validator->errors()->all(), $validator->errors(), 400);
        }

        $userinfo = $this->customerinfo(auth('jwt_auth')->user()->id);

        try {

            $stripe = new StripeClient(env('STRIPE_SECRET'));

            $data = $stripe->paymentMethods->attach(
                $request->pm_id,
                ['customer' => $userinfo?->customer?->stripe_cus_id]
            );

            return sendSuccessResponse('Payment method details',$data,200);

        } catch(\Exception $e) {

            return response()->json([
                'success' => false,
                'message' =>$e->getMessage()
            ],400);

        }

    }



    public function customerPaymentMethodList(Request $request){

        $userinfo = $this->customerinfo(auth('jwt_auth')->user()->id);

        try {


            $stripe = new StripeClient(env('STRIPE_SECRET'));
            $methods =  $stripe->customers->allPaymentMethods(
                $userinfo?->customer?->stripe_cus_id
            );

            $dd = $stripe->customers->retrieve(
                $userinfo?->customer?->stripe_cus_id,
                []
            );

            $data = array();


            foreach ($methods as $key => $item) {
                $data[$key]['is_default']        = 0;
                if(@$dd->invoice_settings->default_payment_method==$item->id){
                    $data[$key]['is_default']        = 1;
                }
                $data[$key]['pm_id']        = $item->id;
                $data[$key]['brand']        = $item->card['brand'];
                $data[$key]['country']      = $item->card['country'];
                $data[$key]['exp_month']    = $item->card['exp_month'];
                $data[$key]['exp_year']     = $item->card['exp_year'];
                $data[$key]['last4']        = $item->card['last4'];
                $data[$key]['funding']      = $item->card['funding'];
                $data[$key]['livemode']     = $item->livemode;
                $data[$key]['billing_details'] = @$item->billing_details->address;
            }

            return sendSuccessResponse('Payment method details',$data,200);

        } catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'message' =>$e->getMessage()
            ],400);
        }

    }

    public function categoryWiseOnlineExperts(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'category_id' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->messages()
            ], 415);
        }
        try {

            $Category = ExpertCategory::find($request->category_id);

            if(! $Category){
                return sendErrorResponse('Category Not Found',[], 400);
            }


            $total_online_users = DB::table('jp_user_online')->where('category_id', $request->category_id)->where('online_status', 'active')->count();
            return sendSuccessResponse('Found Successfully', ['total_online_users' => $total_online_users], 200);

        }catch (\Exception $exception) {
            return sendErrorResponse($exception->getMessage(),[], 400);
        }

    }

    public function conversationDetails(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'conversation_id' => 'required',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->messages()
            ], 415);
        }
        try {

            $conversession = Conversations::find($request->conversation_id);

            if(! $conversession){
                return sendErrorResponse('Category Not Found',[], 400);
            }
            return sendSuccessResponse('Found Successfully', ['conversation' => $conversession], 200);

        }catch (\Exception $exception) {
            return sendErrorResponse($exception->getMessage(),[], 400);
        }

    }

}
