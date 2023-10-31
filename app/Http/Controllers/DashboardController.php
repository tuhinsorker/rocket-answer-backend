<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Conversation\Entities\Conversations;
use Modules\Customer\Entities\Customers;
use Modules\Document\DataTables\DocumentDataTable;
use Modules\Expert\Entities\Expert;
use Modules\Expert\Entities\ExpertCategory;
use Modules\Expert\Entities\PaymentTransaction;
use Modules\Subcription\Entities\Package;
use Modules\Subcription\Entities\PackageInvoice;
use Modules\Template\Entities\Template;
use Modules\TemplateCategory\Entities\TemplateCategory;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Exp;

class DashboardController extends Controller
{
    /**
     * Constructor for the controller.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'status_check'])->except(['redirectToDashboard']);
        \cs_set('theme', [
            'title'      => 'Dashboard',
            'back'       => \back_url(),
            'breadcrumb' => [
                [
                    'name' => 'Dashboard',
                    'link' => false,
                ],

            ],
            'rprefix'    => 'admin.dashboard',
        ]);
    }

    public function index(Request $request)
    {
        $total_expert = Expert::count();
        $total_customer = Customers::count();
        $total_subscription= PackageInvoice::count();
        $total_subscription_amount = PackageInvoice::sum('total_amount');
        $top_10_experts = Expert::withCount('conversations')->orderBy('conversations_count', 'desc')->take(10)->get();
        $top_10_lowest_rating_experts = Expert::withCount('reviews')->orderBy('reviews_count', 'asc')->take(10)->get();

        // this month in and out from PaymentTransaction model for am5 xy chart             // make date format like Jun 01
        // if transaction type is 1 then it will be income and if transaction type is 2 then it will be expense

        // what's wrong with the bellow code
        // $this_month_in_out = PaymentTransaction::select(DB::raw('DATE_FORMAT(created_at, "%b %d") as date'),
        //         DB::Raw("SELECT
        //         CASE transaction_type
        //             WHEN 1 then 'income'
        //             WHEN 2 then 'expense'
        //             ELSE 'Maybe'

       $this_month_in_out = PaymentTransaction::
            selectRaw('DATE_FORMAT(payment_date, "%b %d") as day')
            ->selectRaw("SUM(CASE WHEN transaction_type = '1' THEN amount ELSE 0 END) AS income, ".
            "SUM(CASE WHEN transaction_type = '2' THEN amount ELSE 0 END) AS expenses")
            // ->whereMonth('payment_date', "10")
            // ->whereYear('payment_date', date('Y'))
            ->groupBy('day', 'transaction_type')
            ->get();

            $chartone = $this->chartOne($request);
            $chartTwo = $this->chartTwo($request);




        return view('dashboard', compact('total_expert',
                                         'total_customer',
                                         'total_subscription',
                                         'total_subscription_amount',
                                         'top_10_experts',
                                         'top_10_lowest_rating_experts',
                                        'this_month_in_out',
                                        'chartone',
                                        'chartTwo'
                                    ));
    }





    public function redirectToDashboard()
    {
        return redirect()->route('admin.dashboard');
    }

    public function importFromFile(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'import_file' => 'required|file|mimes:xls,xlsx,csv,txt|max:204800',
        ],[
            'required'  => 'Import file is missing',
            'file'      => 'Should be a file',
            'mimes'     => 'Only .xls, .xlsx, .csv file accepted',
        ]);

        if ($validator->fails()){
            return response()->json([
                'success' => 'false',
                'errors'  => $validator->errors()->all(),
            ], 400);

        }else{

            try {

                $cls = "App\Imports\\".$request->cls;
                Excel::import(new $cls(), $request->import_file);
                return response()->json(['success' => true], 200);


            } catch (\Exception $e) {

                if(get_class($e) == ValidationException::class){
                    return response()->json([
                        'success' => 'false',
                        'errors'  => $e->errors(),
                    ], 400);
                }else if(get_class($e) == \Maatwebsite\Excel\Validators\ValidationException::class){
                    return response()->json([
                        'success' => 'false',
                        'errors'  => $e->errors(),
                    ], 400);
                }
                else{
                    return response()->json([
                        'success' => 'false',
                        'errors'  => "Please Follow the Demo File Data Orientation | ".get_class($e),
                    ], 400);
                }


            }
        }
    }

    public function downloadDemoFile($file_name){
        $filepath = public_path('demo_files/'.$file_name);
        return Response::download($filepath);
    }

    public function getDateWiseTransactionsApi(Request $request)
    {
        return PaymentTransaction::
        selectRaw('DATE_FORMAT(payment_date, "%b %d") as day')
        ->selectRaw("SUM(CASE WHEN transaction_type = '1' THEN amount ELSE 0 END) AS income, ".
        "SUM(CASE WHEN transaction_type = '2' THEN amount ELSE 0 END) AS expenses")
        ->whereBetween('payment_date', [$request->start_date, $request->end_date])

        ->groupBy('day', 'transaction_type')
        ->get();
    }



    public function chartOne($request)
    {

        $data = Customers::selectRaw('COUNT(id) as total')
        ->selectRaw('DATE_FORMAT(created_at, "%b %d") as day')
        ->where('created_at', '>', now()->subDays(30)->endOfDay())->groupBy('day')->get();
        $info = '';
        foreach ($data as $key => $value) {
            $info.= '{
                day: "'.$value->day.'",
                value: '.$value->total.'
              },';
        }
        return $info;
        
    }


    
    public function chartTwo($request)
    {

        $data = Conversations::select('expert_category_id')
        ->selectRaw('COUNT(id) as total')->groupBy('expert_category_id')->get();
      
        $info = '';
        foreach ($data as $key => $value) {
            $cat = ExpertCategory::where('id',$value->expert_category_id)->first();
            $info.= '{value:'.$value->total.',category:"'.@$cat->name.'"},';
        }
        return $info;
        
    }



}
