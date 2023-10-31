<?php

namespace Modules\Report\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Report\DataTables\CustomerBillingHistoryDataTable;
use Modules\Report\DataTables\CustomerRecurringBillingDataTable;
use Modules\Report\DataTables\ExpertPaymentHistoryDataTable;
use Modules\Report\DataTables\ExpertPaymentReportDataTable;

class ReportController extends Controller
{

    public function __construct()
    {
        // $this->middleware(['auth', 'verified', 'permission:openai_creativity_level_management']);
        // $this->middleware('request:ajax', ['only' => ['store', 'update', 'destroy', 'edit']]);
        // $this->middleware('strip_scripts_tag')->only(['store', 'update']);

    }

    public function subscriptionPayment()
    {
        \cs_set('theme', [
            'title'       => 'Subscription Payment Report',
            'description' => 'Subscription Payment Report',

        ]);
        // $customers = Customers::getCustomerList();
        // return $dataTable->render('customer::customer_subscription', ["customers" =>  $customers]);


        return view('report::subscription.__list');
    }


    public function expertPayment()
    {
        \cs_set('theme', [
            'title'       => 'Expert Payment Report',
            'description' => 'Expert Payment Report',

        ]);
        return view('report::expert_payment.__list');
    }

    public function customerRecurringBillingReport(CustomerRecurringBillingDataTable $dataTable){
        \cs_set('theme', [
            'title'       => 'Customer Recurring Billing Report',
            'description' => 'Customer Recurring Billing Report',

        ]);
        return $dataTable->render('report::customer_recurring_billing');
    }

    public function expertPaymentReport(ExpertPaymentReportDataTable $dataTable){
        \cs_set('theme', [
            'title'       => 'Expert Payment Report',
            'description' => 'Expert Payment Report',

        ]);
        return $dataTable->render('report::expert_payment_report');
    }

    public function customerBillingHistoryReport(CustomerBillingHistoryDataTable $dataTable){
        \cs_set('theme', [
            'title'       => 'Customer Billing History Report',
            'description' => 'Customer Billing History Report',

        ]);
        return $dataTable->render('report::customer_billing_history');
    }

    public function expertPaymentHistoryReport(ExpertPaymentHistoryDataTable $dataTable){
        \cs_set('theme', [
            'title'       => 'Expert Payment History Report',
            'description' => 'Expert Payment History Report',

        ]);
        return $dataTable->render('report::expert_payment_history');
    }


}
