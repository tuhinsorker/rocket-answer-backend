<?php

use Illuminate\Support\Facades\Route;
use Modules\Report\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('report')->as('report.')->controller(ReportController::class)->middleware(['auth'])->group(function() {

    Route::get('customer-billing-history', 'customerBillingHistoryReport')->name('customer-billing-history');
    Route::get('expert-payment-history', 'expertPaymentHistoryReport')->name('expert-payment-history');
    Route::get('customer-recurring-billing', 'customerRecurringBillingReport')->name('customer-recurring-billing');
    Route::get('expert-payment-report', 'expertPaymentReport')->name('expert-payment-report');
    Route::get('subscription-payment', 'subscriptionPayment')->name('subscription-payment');
    Route::get('expert-payment', 'expertPayment')->name('expert-payment');
});
