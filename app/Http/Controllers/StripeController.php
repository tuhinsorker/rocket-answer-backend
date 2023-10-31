<?php

namespace App\Http\Controllers;

use Stripe\Charge;

use Stripe\Stripe;
use Stripe\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    public function index()
    {
        return view('checkout');
    }


public function stripePost(Request $request)
{


  // Stripe::setApiKey(env('STRIPE_SECRET'));

  // $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

// $stripe = new \Stripe\StripeClient('sk_test_51MBYXXImRvvOt4BMurCB98K7kTa6dbFlPvNBGe90NmnQ49fwXAJZ4hehCgit4BgZS8wsjX8j7CD9ypsXf2W76ilP00GSvrCTdD');
// return  $stripe->paymentMethods->create([
//   'type' => 'card',
//   'card' => [
//     'number' => '4242424242424242',
//     'exp_month' => 12,
//     'exp_year' => 2034,
//     'cvc' => '314',
//   ],
// ]);



$stripe = new \Stripe\StripeClient('sk_test_51NzjpVSEt5m4qRLCWadhlzcy15ZoIMDLNtWhYQXDjsX0PYBN1jf8fmoZPmdu6clmwaSkvqbjiKzjL1UQn1rb84k5008voTr0Uq');
return $stripe->paymentMethods->create([
  'type' => 'card',
  'card' => [
    'number' => '4242424242424242',
    'exp_month' => 12,
    'exp_year' => 2034,
    'cvc' => '314',
  ],
]);




// return $stripe->paymentMethods->create([
//   'type' => 'card',
//   'card' => [
//     'number' => '4242424242424242',
//     'exp_month' => 12,
//     'exp_year' => 2034,
//     'cvc' => '314',
//   ],
// ]);


    // $customer = Customer::create([
    //     'name' => 'Jahid Limon',
    //     'email' => 'jahid@bdtask.net'
    // ]);

    // $paymentIntent = PaymentIntent::create([
    //     'amount' => $amount,
    //     'currency' => $currency,
    //     'payment_method_data' => [
    //         'type' => 'card',
    //         'card' => [
    //             'token' => $paymentToken,
    //         ],
    //     ],
    //     'confirmation_method' => 'manual',
    //     'customer' => $customer->id
    // ]);
    // $paymentIntent->confirm();


    
    // $customer = Customer::create(array(
    //     "address" => [
    //         "line1" => "Virani Chowk",
    //         "postal_code" => "390008",
    //         "city" => "Vadodara",
    //         "state" => "GJ",
    //         "country" => "IN",
    //     ],
    //     "email" => "demo@gmail.com",
    //     "name" => "Nitin Pujari",
    //     "source" => $request->stripeToken
    // ));

    // Charge::create ([
    //         "amount" => 100 * 100,
    //         "currency" => "usd",
    //         "customer" => $customer->id,
    //         "description"   => "Payment form restora sas project",
    //         "shipping" => [
    //             "name" => "Md Tuhin Sarker",
    //             "address" => [
    //                 "line1" => "510 Townsend St",
    //                 "postal_code" => "98140",
    //                 "city" => "San Francisco",
    //                 "state" => "CA",
    //                 "country" => "US",
    //             ],
    //         ]
    // ]); 
    // Session::flash('success', 'Payment successful!');
    // return back();


    // $intent = $stripe->paymentIntents->create([
    //     'amount'                    => 100*20,
    //     'currency'                  => 'usd',
    //     "automatic_payment_methods" => [ "enabled"=> true]
    // ]);




  // if(empty($userinfo->customer->stripe_cus_id)){
  //     $cus = Customer::create([
  //         'name'  => @$userinfo->name,
  //         'email' => @$userinfo->email,
  //         "source" => $stripeToken
  //     ]);
  //     $customer = $cus->id;
  //     Customers::where('id',$userinfo->customer->id)->update(['stripe_cus_id'=>$cus->id]);

  // }else{
  //     $customer = $userinfo->customer->stripe_cus_id;
  // }


  // $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));



  // $stripe->paymentIntents->create([
  //   'amount' => 2000,
  //   'currency' => 'usd',
  //   'automatic_payment_methods' => [
  //     'enabled' => true,
  //     'type' => 'card',
  //           'card' => [
  //               'token' => $request->stripeToken
  //       ],
  //   ],
  //   'customer' => 'cus_OdSbA1ScFtms3F'
  // ]);

  

  // $paymentIntent = $stripe->paymentIntents->create([
  //     'customer' => 'cus_OdSbA1ScFtms3F',
  //     'amount' => 200,
  //     'currency' => 'usd',
  //     'payment_method_data' => [
  //         'type' => 'card',
  //         'card' => [
  //             'token' => $request->stripeToken
  //         ],
  //     ],
  //     'confirmation_method' => 'automatic',
  //     "description"   => "Payment form Local"
  // ]);
  //  return $pp = $paymentIntent->confirm();



  // return   $data = $stripe->paymentMethods->attach(
  //     $pp->payment_method,
  //     ['customer' => 'cus_OdSbA1ScFtms3F']
  // );




  
  // return $stripe->charges->all(["customer"=> "cus_OdSbA1ScFtms3F",'limit' => 3]);


  //   $customer = Customer::create(array(
  //       "address" => [],
  //       "email"   => "mt92@gmail.com",
  //       "name"    => "mt92",
  //       "source"  => $request->stripeToken
  //   ));
  //   $customer_id = $customer->id;


  return $stripe->charges->create([
        'amount' => 100 *20,
        'currency' => 'usd',
        'customer' => 'cus_OdSbA1ScFtms3F',
        "description"   => "Payment form Local"
  ]);


  return $stripe->customers->createSource(
    'cus_OdSbA1ScFtms3F',
    ['source' => $request->stripeToken]
  );

  return $stripe->customers->allSources(
      'cus_OasxQFa6HS8gUO',
      [
        'object' => 'card',
        'limit' => 3,
      ]
  );


 

   return  $stripe->customers->allSources(
      'cus_Od1dShHHEhYm6K',
      [
        'object' => 'card',
        'limit' => 3,
      ]
    );


    return $stripe->customers->retrieve(
      'cus_Od1dShHHEhYm6K',
      []
    );


    

    //create product
    $product = $stripe->products->create([
      'name' => 'Product_1',
      'id'   => '124',
      'metadata' => [
        'name' => "Product_1",
        'last-date' => '07-08-2023'
      ]
    ]);
    $product_id = $product->id;

    //define product price and recurring interval
    //Invalid recurring[interval]: must be one of month, year, week, or day
    $price = $stripe->prices->create([
      'unit_amount' => 2000,
      'currency' => 'usd',
      'recurring' => ['interval' => 'day'],
      'product' => $product_id,
    ]);

    $price_id = $price->id;

    //CREATE SUBSCRIPTION
    $subscription = $stripe->subscriptions->create([
      'customer' => $customer_id,
      'items' => [
        ['price' => $price_id],
      ],
      'metadata' => [
        'start_date' => '07-08-2023',
        'total_day' => '1',
        'end_date' => '10-08-2023'
      ]
    ]);

    dd($subscription);

    Session::flash('success', 'Payment successful!');
    return back();
    
}


public function cancle() {

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $response = $stripe->subscriptions->cancel(
            "sub_1NcQjkImRvvOt4BM8mHIiaC7",
            ['prorate' => 'true']
        );

dd($response);

    Session::flash('success', 'Payment successful!');
    return back();
}
     
      
    public function createCharge(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create ([
                "amount" => 5 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Binaryboxtuts Payment Test"
        ]);
     

        return "success";
        return redirect('stripe')->with('success', 'Payment Successful!');
    }
}
