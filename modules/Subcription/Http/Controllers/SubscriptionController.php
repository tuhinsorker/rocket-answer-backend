<?php

namespace Modules\Subcription\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Subcription\DataTables\SubscriptionDataTable;
use Modules\Subcription\Entities\Subscription;

class SubscriptionController extends Controller
{
    
    public function index(SubscriptionDataTable $dataTable)
    {

        \cs_set('theme', [
            'title'       => 'Invoice List',
            'description' => 'Invoice list.'
        ]);

        return $dataTable->render('subcription::subscription.index');

    }

    public function viewInvoice(){

        \cs_set('theme', [
            'title'       => 'Invoice List',
            'description' => 'Invoice list.'
        ]);
        $invoice = Subscription::with(['customer','category'])->where('subscription_id','SUBS-1')->first();
        return view('subcription::pdf.invoice',['invoice'=>$invoice]);

    }


}
