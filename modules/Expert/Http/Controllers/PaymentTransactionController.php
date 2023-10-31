<?php

namespace Modules\Expert\Http\Controllers;

use App\Traits\Common;
use Illuminate\Http\Request;
use Faker\Provider\ar_EG\Payment;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Expert\Entities\Expert;
use Illuminate\Contracts\Support\Renderable;
use Modules\Expert\DataTables\ExpertDataTable;
use Modules\Expert\Entities\PaymentTransaction;
use Modules\Expert\Entities\ExpertWithdrawRequest;
use Modules\Expert\DataTables\PaymentTransactionDataTable;
use Modules\Expert\DataTables\ExpertWithdrawRequestDataTable;

class PaymentTransactionController extends Controller
{

    use Common;
    public function __construct()
    {
        // $this->middleware(['auth', 'verified', 'permission:openai_creativity_level_management']);
        // $this->middleware('request:ajax', ['only' => ['store', 'update', 'destroy', 'edit']]);
        // $this->middleware('strip_scripts_tag')->only(['store', 'update']);
        \cs_set('theme', [
            'title' => 'Payment Transaction Lists',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Payment Transaction Lists',
                    'link' => false,
                ],
            ],
            'rprefix' => 'payment-transaction',
        ]);
    }

    private function view_path($path)  {
        return 'expert::payment_transaction.'.$path;
    }

    public function statusUpdate(Request $request) {

        // $data = $request->validate([
        //     'id' => 'required|integer',
        //     'status' => 'required|integer',
        // ]);
        $expertWithDrawRequest = ExpertWithDrawRequest::find($request->id);
        if (! $expertWithDrawRequest) {
            return response()->error(null, 'Data Not Found', 404);
        }
        $expertWithDrawRequest->is_approve = $request->status == 2 ? 1 : 0;
        $expertWithDrawRequest->save();


        return response()->success($expertWithDrawRequest, 'Data updated successfully.', 200);
    }



    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(PaymentTransactionDataTable $dataTable)
    {
        $experts = Expert::where('status',1)->get();
        $payment_methods = DB::table('payment_methods')->get();
        return $dataTable->render($this->view_path('index'), [
            'experts' => $experts,
            'payment_methods' => $payment_methods,

        ]);
    }

    public function create(Request $request, $withdraw_request_id)
    {

        \cs_set('theme', [
            'title' => 'Make Transaction',
            'back' => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => route('admin.dashboard'),
                ],
                [
                    'name' => 'Make Transa',
                    'link' => false,
                ],
            ],
            'rprefix' => 'payment-transaction',
        ]);


        $item = ExpertWithDrawRequest::with('expert')->find($withdraw_request_id);

        if(!$item) {
            return response()->error(null, 'Data Not Found', 404);
        }

        $payment_methods = DB::table('payment_methods')->get();


        return view($this->view_path('create'), compact('item','payment_methods'))->render();


    }



    public function createPaymentTransaction(Request $request)
    {





        $data = $request->validate([
            'payment_method_id' => 'required',
            'expert_id' => 'required',
            'amount' => 'required|numeric',
            // 'attachment' => 'image|max:2048|mimes:jpeg,png,jpg',
            'payment_date' => 'required|date',
            'email' => 'required|email',

        ]);

        try {

            $data['attachment'] = \upload_file($request,'attachment', 'payment_transaction');

            $data = PaymentTransaction::create([
                'expert_id'     => $request->expert_id,
                'amount'        => $request->amount,
                'attachment'    => $data['attachment'],
                'payment_method_id' => $request->payment_method_id,
                'transaction_type' => 2,
                'payment_date' => $request->payment_date,
                'email' => $request->email,


            ]);

            $this->expertBalanceDeduction($request->expert_id,$request->amount);

            set_push_notification('Your balance is credit','Your balance is credit', (int)$request->expert_id);

            $data = [
                'type'=>3,
                'expert_id'=>$request->expert_id,
                'conversation_id'=>null,
                'payment_transaction_id'=>$data->id,
                'title'=>'Your balance is credit',
                'body'=>'Your balance is credit '.$request->amount??0,
            ];
            $this->notification($data);


            return response()->success($data, 'Data Added Successfully.', 201);
        } catch (\Throwable $th) {
            return response()->error(null, 'Payment Transactions Failed '.$th->getMessage(), 500);
        }


    }

    /**
     * Store a newly created resource in database.
     *
     * @return Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'withdraw_request_id'   => 'required|string|max:255',
            'payment_method_id'     => 'required',
            'attachment'            => 'image|max:2048|mimes:jpeg,png,jpg',
            'payment_date'          => 'required|date',
            'email'                 => 'required|email',
        ]);

        $item = ExpertWithDrawRequest::with('expert')->find($request->withdraw_request_id);


        if($item ){

            $expbalance = DB::table('expert_balances')->where('expert_id',$item->expert_id)->first();


            if($item->request_amount <= @$expbalance->balance) {

                $this->expertBalanceDeduction($item->expert_id,$item->request_amount);

                $expertWithDrawRequest = ExpertWithDrawRequest::find($request->withdraw_request_id);
                $expertWithDrawRequest->approve_by = auth()->user()->id;
                $expertWithDrawRequest->approved_date = date('Y-m-d');
                $expertWithDrawRequest->is_approve = 1;
                $expertWithDrawRequest->update();


                $data['attachment'] = \upload_file($request,'attachment', 'payment_transaction');

                $info = PaymentTransaction::create([
                    'code'                          => uniqueId('payment_transactions','TRN-'),
                    'expert_id'                     => $item->expert_id,
                    'expert_withdraw_request_id'    => $request->withdraw_request_id,
                    'amount'                        => $item->request_amount,
                    'attachment'                    => $data['attachment'],
                    'payment_method_id'             => $request->payment_method_id,
                    'transaction_type'              => 2,
                    'payment_date'                  => $request->payment_date,
                    'email'                         => $request->email,
                ]);
                set_push_notification('Your balance is credit','Your balance is credit', (int)$request->expert_id);
                $data = [
                    'type'              => 3,
                    'expert_id'         => $request->expert_id,
                    'conversation_id'   =>'',
                    'payment_transaction_id'=>$info->id,
                    'title'=>'Your balance is credit',
                    'body'=>'Your balance is credit '.$request->amount??0,
                ];
                $this->notification($data);
                return redirect()->route('payment-transaction.index')->with('success', 'Payment Transaction Created Successfully');

            }else{
                return redirect()->route('payment-transaction.create',$item->id)->with('error', 'Insufficient Balance');
            }

        }
        else {
            return response()->error(null, 'Data Not Found', 404);
        }

    }



    public function edit(Request $request)
    {
        $paymentTransaction = PaymentTransaction::find($request->id);
        if (!$paymentTransaction) {
            return response()->error(null, 'Data Not Found', 404);
        }

        return response()->success($paymentTransaction, 'Data fetched successfully.', 200);
    }



    public function show(Request $request)
    {
        $expertWithdrawRequest = ExpertWithDrawRequest::with('expert','card_type','approved_by')->find($request->id);
        if (! $expertWithdrawRequest) {
            return response()->error(null, 'Data Not Found', 404);
        }


        return view($this->view_path('show'), compact('expertWithdrawRequest'))->render();
    }



    public function update(Request $request)
    {

        $paymentTransaction = PaymentTransaction::find($request->id);

        if(!$paymentTransaction) {
            return response()->error(null, 'Data Not Found', 404);
        }

        $data = $request->validate([
            'payment_method_id' => 'required',
            'expert_id' => 'required',
            // 'attachment' => 'required|image|max:2048|mimes:jpeg,png,jpg',
            'payment_date' => 'required|date',
        ]+ ($paymentTransaction->transaction_type == 2 ? ['amount' => 'required|numeric|max:'.deduct_expert_balance($request->expert_id, $request->amount),] : []));


        try {

            $attachment = null;
            if($request->hasFile('attachment')){
                $attachment = \upload_file($request,'attachment', 'payment_transaction');
            }

            $paymentTransaction->update([

                'expert_id'         => $request->expert_id,
                'amount'            => $request->amount,
                'attachment'        => $attachment ?? $paymentTransaction->attachment,
                'payment_method_id' => $request->payment_method_id,
                'transaction_type'  => $paymentTransaction->transaction_type,
                'payment_date'      => $request->payment_date,
                'email'             => $request->email,

            ]);

            return response()->success($data, 'Data Updated Successfully.', 201);

        } catch (\Throwable $th) {
            return response()->error(null, 'Payment Transactions Update Failed '.$th->getMessage(), 500);
        }
    }



    public function destroy(PaymentTransaction $paymentTransaction)
    {
        $paymentTransaction->delete();
    }

}
