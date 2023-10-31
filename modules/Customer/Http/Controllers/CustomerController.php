<?php

namespace Modules\Customer\Http\Controllers;

use App\Models\User;
use App\Traits\Common;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Modules\Customer\Entities\Customers;
use Illuminate\Support\Facades\Validator;
use Modules\Expert\Entities\ExpertReview;
use Illuminate\Contracts\Support\Renderable;
use Modules\Expert\Entities\PaymentTransaction;
use Modules\Conversation\Entities\Conversations;
use Modules\Subcription\Entities\PackageInvoice;
use Modules\Customer\DataTables\CustomerDataTable;
use Modules\Conversation\Entities\ConversationDetails;
use Modules\Customer\DataTables\ContactQueryDataTable;
use Modules\Customer\DataTables\InvoicePackagesDataTable;
use Modules\Subcription\DataTables\SubscriptionDataTable;
use Modules\Customer\DataTables\CustomerConversationDataTable;

class CustomerController extends Controller
{

    use Common;

    /**
     * Constructor for the controller.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'permission:customer_management']);
        $this->middleware('request:ajax', ['only' => ['destroy', 'statusUpdate']]);
        \cs_set('theme', [
            'title'       => 'Customer List',
            'description' => 'Displaying all Customers.',
            'back'        => \back_url(),
            'rprefix'     => 'admin.customer',
        ]);

        // dd(route(config('theme.rprefix')));
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(CustomerDataTable $dataTable)
    {

        return $dataTable->render('customer::index');
        // return view('customer::index');
    }

    public function contactQuery(ContactQueryDataTable $dataTable)
    {
        \cs_set('theme', [
            'title'       => 'Customer Contact Message',
            'description' => 'Customer Contact Message',
        ]);
        return $dataTable->render('customer::contact_query');
        
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        \cs_set('theme', [
            'title'       => 'Create New Customer',
            'description' => 'Creating new Customer.',
        ]);

        // dd(Customers::getCountryList());
        // dd(config('theme'));

        return view('customer::create_edit');

        // return view('customer::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {


        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'phone'    => 'required|string|max:20',
            'dob'      => 'required',
            'country_id' => 'required',
            'password'  => 'required|string|min:6',
        ]);


        if ($request->hasFile('avatar')) {

            $request->validate([
                'avatar' => 'image',
            ]);

            $file = $request->file('avatar');
            //Upload File
            $destinationPath = 'uploads';
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs($destinationPath, $fileName, 'public');
            $data['image'] = $filePath;
        }

        try {

            // DB::beginTransaction();

                $user = User::create([
                    'name'       => $request->name,
                    'user_name'  => $request->name,
                    'email'      => $request->email,
                    'password'   => Hash::make($request->password),
                    'user_type'  => 4,
                ]);

                $data['code']               = uniqueId('customers','CUS');
                $data['user_id']            = $user->id;
                $data['name']               = $request->name;
                $data['email']              = $request->email;
                $data['phone']              = $request->phone;
                $data['dob']                = $request->dob;
                $data['country_id']         = $request->country_id;
                $data['address']            = $request->address;

                Customers::create($data);

            // DB::commit();

            Session::flash('success', 'Successfully Stored new customer data.');

            return \redirect()->route(config('theme.rprefix') . '.index');

        } catch( \Exception $e){

            Session::flash('error', $e->getMessage());
            return \redirect()->route(config('theme.rprefix') . '.index');
        }

    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('customer::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Customers $customer)
    {
        \cs_set('theme', [
            'title'       => 'Update Customer',
            'description' => 'Updating Customer.',
            'breadcrumb'  => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Customer List',
                    'link' => \route('admin.customer.index'),
                ],
                [
                    'name' => 'Update Customer',
                    'link' => false,
                ],
            ],
        ]);

        return view('customer::create_edit', ['item' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Customers $customer)
    {

        // dd($customer->image);

        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string',
            'phone'    => 'required|string|max:20',
            'dob'      => 'required',
            'country_id' => 'required',
        ]);
        $data['address'] = $request->address;

        if ($request->hasFile('avatar')) {
            $request->validate([
                'avatar' => 'image',
            ]);

            $file = $request->file('avatar');
            //Upload File
            $destinationPath = 'uploads';
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs($destinationPath, $fileName, 'public');
            $data['image'] = $filePath;

            // Delete image file from storage folder
            $customer->image ? Storage::delete($customer->image) : null;
        }

        if($customer->update($data)){
            // flash message
            Session::flash('success', 'Successfully Updated customer informaiton.');
        }else{
            Session::flash('error', 'Something wrong please try again.');
        }

        return \redirect()->route(config('theme.rprefix') . '.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Customers $customer)
    {

        if(PackageInvoice::where('customer_id',$customer->id)->count()>0){
            return response()->error('', 'You Can not delete this customer, the customer have packages', 500);
        }else{
            if($customer->delete()){
                User::where('id',$customer->user_id)->delete();
                // Delete image file from storage folder
                $customer->image ? Storage::delete($customer->image) : null;
                return response()->success('', 'Successfully deleted  customer information.', 200);
            }else{
                return response()->error('', 'Something wrong please try again.', 500);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statusUpdate(Customers $customer, Request $request)
    {
        $customer->update(['status' => $request->status]);

        return \response()->success($customer, 'User Status Updated Successfully.', 200);
    }



    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function customerSubscription(SubscriptionDataTable $dataTable)
    {

        \cs_set('theme', [
            'title'       => 'Customer Subscription List',
            'description' => 'Customer Subscription List',

        ]);
        $customers = Customers::get();
        return $dataTable->render('customer::customer_subscription', ["customers" =>  $customers]);

        // return view('customer::index');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function customerConversationHistory(CustomerConversationDataTable $dataTable)
    {

        \cs_set('theme', [
            'title'       => 'Customer Conversation List',
            'description' => 'Customer Conversation List',

        ]);
        $customers = Customers::get();
        return $dataTable->render('customer::customer_conversation', ["customers" =>  $customers]);

    }

    

    public function customerConversationLogs(Request $request)
    {
        \cs_set('theme', [
            'title'       => 'Conversation Details',
            'description' => 'Conversation Details'
        ]);

        $conversation_id = $request->conversation_id;

        $conversation_details = ConversationDetails::with(['customer_sender_data', 'expert_sender_data','customer_receiver_data', 'expert_receiver_data'])
                                                    ->where('conversation_id',$conversation_id)
                                                    ->orderBy('id','asc')
                                                    ->get();

        $conversation = Conversations::where('id',$conversation_id)->first();
        return view('customer::conversation_details', ['conversation' => $conversation,'items' => $conversation_details]);
    }


    public function viewSubscription(PackageInvoice $subscription)
    {

        \cs_set('theme', [
            'title'       => 'Customer Subscription',
            'description' => 'Customer Subscription.'
        ]);

        $subscription_details = PackageInvoice::with(['customer', 'package'])->where('id', $subscription->id)->first();
        $remaining_days = $this->remainingDays($subscription_details);

        return view('customer::view_customer_subscription', ['remaining_days' => $remaining_days,'customer_subscription' => $subscription_details]);
    }





    public function closeActivityByAdmin(Request $request)
    {


        $validation = Validator::make($request->all(), [
            'conversation_id' => 'required',
            'rating' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->messages()
            ], 415);
        }


        try {

            $conversession = Conversations::where(['id'=>$request->conversation_id])->first();

            if(! $conversession){
                return sendErrorResponse('Conversations Not Found',[], 400);
            }




            if(@$request->rating){
                if($conversession->rating > 0){
                    return response()->json([
                        'success' => false,
                        'message' => 'You have already rating this Conversations'
                    ]);
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
                'rating'             => @$request->rating??'0',
                'is_customer_closed' => 1,
                'end_time'           => date('H:i:s'),
            );

            Conversations::where('id',$request->conversation_id)->update($cloasedata);


            $response = array(
                'success'  => true,
                'title'     =>'Rating',
                'message'  => 'Successfully rating is added'
            );
            return json_encode($response);

            return sendSuccessResponse('Successfully rating is added','',200);


        }catch (\Exception $exception) {

            $response = array(
                'success'  =>false,
                'title'     =>'Rating',
                'message'  => $exception->getMessage()
            );
            return json_encode($response);
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





}
