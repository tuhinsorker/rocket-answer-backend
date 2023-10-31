<?php

namespace Modules\Subcription\Http\Controllers;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Role\Entities\Module;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Modules\Setting\Entities\Setting;
use Illuminate\Support\Facades\Storage;
use Modules\Subcription\Entities\Package;
use Modules\Subcription\Entities\PackageInvoice;

use Modules\Subcription\Http\Requests\InvoiceRequest;
use Modules\Subcription\Entities\PackagePaymentMethod;
use Modules\Subcription\Entities\PackageInvoicePayment;
use Modules\Subcription\Entities\PackageRecarringInvoice;
use Modules\Subcription\DataTables\InvoicePackagesDataTable;
use Modules\Subcription\Entities\PackageRecarringInvoicePayment;

class InvoiceController extends Controller
{

    public function index(InvoicePackagesDataTable $dataTable)
    {

        \cs_set('theme', [
            'title'       => 'Invoice List',
            'description' => 'Invoice list.'
        ]);

        return $dataTable->render('subcription::invoice.index');

    }


    public function filterInvoice($request = null)
    {

        $query = PackageInvoice::whereNotNull('id');


        if(!empty($request->package_id)){
            $query =$query->where('package_id', $request->package_id);
        }

        if(!empty($request->mydaterenge)){

            $dateRange = explode("/",$request->mydaterenge);
            $startdate = $dateRange[0];
            $enddate   = $dateRange[1];
            $query = $query->whereBetween('invoice_date', [$startdate, $enddate]);

        }
        return $query;

    }


    public function show($id)
    {
        return view('subcription::show');
    }



    public function sentInvoiceByMail($invoice_id){

        $invoice = PackageInvoice::with(['client','package','packageInvoicePayment','packageDuration'])->findOrFail($invoice_id);
        $data = [
            'invoice' => $invoice,
            'settings' => Setting::first()
        ];
        $pdf = PDF::loadView('subcription::pdf.invoice', $data);

        Storage::put('pdf/invoice.pdf', $pdf->output());
        $data = array(
            'email'         => $invoice->client?->client_email,
            'form_address'  => 'tuhinsorker92@gmail.com',
            'file'          => Storage::path('pdf/invoice.pdf')
        );

        Mail::send('subcription::pdf.email', $data, function($message) use ($data){
            $message->to($data['email']);
            $message->from($data['form_address']);
            $message->subject('Your Next Payment Invoice');
            $message->attach($data['file']);
        });

        if(Storage::exists('pdf/invoice.pdf')){
             Storage::delete('pdf/invoice.pdf');
        }


    }


}
