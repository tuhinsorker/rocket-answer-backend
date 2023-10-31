<?php

namespace App\Traits;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;
use App\Models\Notifications;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Modules\Cms\Entities\CmsSetting;

use Illuminate\Support\Facades\Storage;
use Modules\Customer\Entities\Customers;
use Modules\Setting\Entities\CardTypes;
use Modules\Expert\Entities\ExpertCategory;
use Modules\Setting\Entities\PaymentMethods;
use Modules\Subcription\Entities\Subscription;
use Modules\Expert\Entities\PaymentTransaction;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

trait Common
{

    public function customerinfo($id)
    {
        $user  = User::with('customer.country')->findOrFail($id);
        return $user;
    }

    public function expertinfo($id)
    {
        $user  = User::select('user_name','id')->with('expert','expert.category','expert.subCategory','expert.country','expert.documents','expert.educations','expert.jobs')->findOrFail($id);
        return $user;
    }
    
    public function cardtype()
    {
        return $this->belongsTo(CardTypes::class,'card_type_id','id');
    }

    public function payment_method()
    {
        return $this->belongsTo(PaymentMethods::class);
    }


    public function cmsSetting($id)
    {
        $CmsSetting = CmsSetting::select('details')->firstWhere('id',$id);
        $websetup = json_decode($CmsSetting?->details);
        return $websetup;
    }


    public function expertBalanceDeduction($expert_id,$pay_amount){
        $expert_balance = DB::table('expert_balances')->where('expert_id',$expert_id)->first();
        
        if(@$expert_balance->balance>0){
            $balance['balance'] = $expert_balance->balance-$pay_amount;
            $expert_balance = DB::table('expert_balances')->where('expert_id',$expert_id)->update($balance);
            return true;
        }else{
            return false;
        }
        
    }


    public function expertPaymentSetup($expert_id,$category_id) {

        
        $expertpaymentsetup = DB::table('expert_payment_setups')->where('expert_id',$expert_id)->first();
        $cat_expertpaymentsetup = DB::table('expert_categories')->where('id',$category_id)->first();
        if($expertpaymentsetup?->pay_amount){

            $data = [
                'per_session_fixed_amount'=>$expertpaymentsetup->pay_amount??0,
                'return_session_commission'=>$expertpaymentsetup->second_pay_amount??0,
                'rating_range'=>$expertpaymentsetup->rating_range??0,
            ];
        }elseif($cat_expertpaymentsetup?->payment_amount>0){

            
            $data = [
                'per_session_fixed_amount'=>$cat_expertpaymentsetup->payment_amount??0,
                'return_session_commission'=>$cat_expertpaymentsetup->second_pay_amount??0,
                'rating_range'=>$cat_expertpaymentsetup->rating_range??0,
            ];
        }else{
            $expertpaymentsetup = DB::table('default_payment_setups')->first();
            
            $data = [
                'per_session_fixed_amount'=>$expertpaymentsetup->payment_amount??0,
                'return_session_commission'=>$expertpaymentsetup->second_pay_amount??0,
                'rating_range'=>$expertpaymentsetup->rating_range??0,
            ];
        }

        return (object)$data;
    }


    public function expertBalanceInfo($expert_id,$category_id){

        $Conversations = DB::table('conversations')
        ->selectRaw("SUM(rating) AS total_ratting")
        ->selectRaw('count(id) as total_conversation')
        ->where('expert_id',$expert_id)->first();

        $cat_wise_conversation = DB::table('conversations')->where('expert_category_id',$category_id)->count();

        $total_earnings = PaymentTransaction::where('transaction_type',1)->where('expert_id',$expert_id)->sum('amount');
        $total_withdraw = PaymentTransaction::where('transaction_type',2)->where('expert_id',$expert_id)->sum('amount');
     

        if($Conversations->total_ratting>0){
            $avareg_rating = @$Conversations->total_ratting/@$Conversations->total_conversation;
        }else{
            $avareg_rating = 0.00;
        }
        
        $expert_balances = DB::table('expert_balances')->where('expert_id',$expert_id)->first();
        $expert_balances = $expert_balances?->balance?$expert_balances->balance:0.00;

        $avareg_rating1 = sprintf('%0.1f', $avareg_rating);
        $total_earnings = sprintf('%0.2f', $total_earnings);
        $total_withdraw = sprintf('%0.2f', $total_withdraw);

        $result = (object) array(
            "total_conversation"    => "$Conversations->total_conversation",
            "cat_wise_conversation" => "$cat_wise_conversation",
            "avareg_rating"         => "$avareg_rating1",
            "total_earnings"        => "$total_earnings",
            "total_withdraw"        => "$total_withdraw",
            "expert_balances"       => "$expert_balances",
            "avareg_respons_time"   => "10 Min",
        );

        return $result;
    }


    private function checkPaymentTransection($token){
        try{

            $provider = new PayPalClient;

            $provider->setApiCredentials(config('paypal'));
            $provider->getAccessToken();

            $response = $provider->capturePaymentOrder($token);
            //$response = $provider->getExpressCheckoutDetails($request['token']);
            
            if (isset($response['status']) && $response['status'] == 'COMPLETED') {

                    $result = [  
                        'status'   => true,
                        'message'   => 'Transaction complete.'
                    ];
                    return (object)$result;

            } else {

                $result = [  
                    'status'   => false,
                    'message'   =>  $response['message'] ?? 'Something went wrong.'
                ];
                return (object)$result;
            }

        }catch(\Exception $e){
            $result = [  
                'status'   => false,
                'message'   =>  $e->getMessage()
            ];
            return (object)$result;
        }
    }


    
    private function checkStripPayment($stripeToken,$pricing,$userinfo)
    {
        try {

            Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

            if(empty($userinfo->customer->stripe_cus_id)){

                $cus = Customer::create([
                    'name'  => @$userinfo->name,
                    'email' => @$userinfo->email,
                    "source" => $stripeToken
                ]);
                $customer = $cus->id;
                Customers::where('id',$userinfo->customer->id)->update(['stripe_cus_id'=>$cus->id]);

                // payment create to stripe
                $ch = $stripe->charges->create([
                    'amount' => 100 * @$pricing->trial_price,
                    'currency' => 'usd',
                    'customer' => $customer,
                    "description"   => "Payment form rocket answer"
                ]);

                $ch_id = $ch->id;
    
            }else{

                // payment create to stripe
                $customer = $userinfo->customer->stripe_cus_id;

                $paymentIntent = $stripe->paymentIntents->create([
                    'customer' => $customer,
                    'amount' => 100 * @$pricing->trial_price,
                    'currency' => 'usd',
                    'payment_method_data' => [
                        'type' => 'card',
                        'card' => [
                            'token' => $stripeToken
                        ],
                    ],
                    'confirmation_method' => 'automatic',
                    "description"   => "Payment form rocket answer"
                ]);
                $ch = $paymentIntent->confirm();
                $ch_id = $ch->latest_charge;
            }

            // make subscription to stripe
            //$subscription_id = '';
            // if(@$pricing->stripe_price_id){
                
            //     $subscription = $stripe->subscriptions->create([
            //         'customer' => $customer,
            //         'items' => [
            //             ['price' => @$pricing->stripe_price_id],
            //         ],
            //         'metadata' => [
            //             'start_date' => date('Y-m-d')
            //         ]
            //     ]);
            //     $subscription_id = $subscription->id;
            // }


            $result = [  
                'status'   => true,
                'message'   => 'Transaction complete.',
                'subs_id'   => '',
                'ch_id'     => $ch_id
            ];

            return (object)$result;
          
   

        }catch(\Exception $e){

            $result = [  
                'status'   => false,
                'message'   =>  $e->getMessage()
            ];

            return (object)$result;
        }
    }


    public function sentInvoiceByMail($invoice_id){

        $invoice = Subscription::with(['customer','category'])->where('subscription_id',$invoice_id)->first();
        $data = ['invoice' => $invoice ];
        $pdf = PDF::loadView('subcription::pdf.invoice', $data);
        
        $pdfname = 'pdf/'.$invoice->id.uniqid().'.pdf';

        Storage::put($pdfname, $pdf->output());

        $data = array(
            'email'         => $invoice->customer?->email,
            // 'form_address'  => 'tuhinsorker92@gmail.com',
            // 'file'          => Storage::path('pdf/invoice.pdf')
        );
        Mail::send('subcription::pdf.email', $data, function($message) use ($data){
            $message->to($data['email']);
            // $message->from($data['form_address']);
            $message->subject('Payment Invoice');
            // $message->attach($data['file']);
        });
        return $pdfname;
        // if(Storage::exists('pdf/invoice.pdf')){
        //     Storage::delete('pdf/invoice.pdf');
        // }
    }



    public function paypalMerchentAccount(){

        $info = PaymentMethods::select('id','name','client_id')->get();
        $data = array(
            'client_id'         => $info[0]->client_id,
            'strip_pk_key'      => $info[1]->client_id
        );
        return (object)$data;
        
    }


    public function remainingDays($invoice_package) : string
    {
        $remaining_days = 0;
        $diff_in_days   = 0;

        $current_date = \Carbon\Carbon::now();
        if(isset($invoice_package->invoice_date)){
            $invoice_date = $invoice_package->invoice_date;
            $diff_in_days = $current_date->diffInDays($invoice_date);
        }
        if(isset($invoice_package->package->duration)){
            if($diff_in_days > 0 && $diff_in_days <= (int) $invoice_package->package->duration){
                $remaining_days = (int) $invoice_package->package->duration - $diff_in_days;
            }
        }
        return $remaining_days;
    }


    
    public function productCreateToStripe($productInfo){

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        //create product
        $product = $stripe->products->create([
            'name' => $productInfo['name'],
            'id'   => $productInfo['name'].'-'.$productInfo['code'],
            'metadata' => [
                'name' => $productInfo['name'],
                'last-date' => date('Y-d-m')
            ]
        ]);
        return  $product->id;
        
    }


        
    public function productUpdateToStripe($productInfo){
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        //create product
        $product = $stripe->products->update([
            'name' => $productInfo['name'],
            'id'   => $productInfo['code'],
            'metadata' => [
                'name' => $productInfo['name'],
                'last-date' => date('Y-d-m')
            ]
        ]);
       return  $product->id;
    }


    public function createSubscriptionToStripe($price_id,$customer_id){

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $subscription = $stripe->subscriptions->create([
            'customer' => $customer_id,
            'items' => [
                ['price' => $price_id],
            ],
            'metadata' => [
            'start_date' => '07-08-2023'
            ]
        ]);

       return  $subscription->id;

    }



    public function pricSetToStripe($productInfo,$stripe_price_id){

        $cat = ExpertCategory::where('id',$productInfo['category_id'])->first();
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        // if($stripe_price_id!=''){
        //     $stripe->plans->delete(
        //         $stripe_price_id,
        //         []
        //     );
        // }
        

        $price = $stripe->prices->create([
            'unit_amount' =>100*$productInfo['recurring_price'],
            'currency' => 'usd',
            'recurring' => ['interval' => 'day','interval_count' => $productInfo['recurring_day']],
            'product' => $cat->stripe_code,
          ]);
        return  $price->id;

    }


    public function subscriptionCancelToStripe($stripe_subs_id){

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $response = $stripe->subscriptions->cancel(
            "$stripe_subs_id",
            ['prorate' => 'true']
        );
       return  $response;
    }





    public function notification($data)
    {
        return Notifications::create($data);
    }




     

}
