<?php

use Illuminate\Support\Facades\Route;
use Modules\Subcription\Http\Controllers\InvoiceController;

Route::prefix('subcription')->middleware(['auth'])->group(function() {

    Route::resource('packages','PackageController');
    Route::get('packages/delete/{package}','PackageController@destroy')->name('packages.delete');


    

    Route::get('get-package-info','PackageController@getPackageInfo')->name('get-package-info');
    Route::get('get-packages','PackageController@getPackageInfoByType')->name('get-packages');
    
    Route::resource('packages-invoices','InvoiceController');
    Route::get('send-mail/{invoice_id}','InvoiceController@sentInvoiceByMail')->name('send-mail');


    Route::resource('payment-methods','PaymentMethodController');
    Route::resource('recarring-invoices','RecarringInvoiceController');
    Route::get('sent-invoices','PackageInvoiceSentController@sentInvoice');
    Route::resource('package-durations','PackageDurationController');
    Route::resource('salespackages','SalesPackageController');

    Route::get('/demo/download-demo-file/{file_name}', [InvoiceController::class,'downloadDemoFile'])->name('invoice.download.demo_file');


    Route::resource('subscription-invoice', 'SubscriptionController');
    Route::get('view-invoice', 'SubscriptionController@viewInvoice')->name('view-invoice');
    Route::resource('pricing','PricingController');



});

