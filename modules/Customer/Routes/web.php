<?php


use Illuminate\Support\Facades\Route;
use Modules\Customer\Http\Controllers\CustomerController;


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

Route::prefix('admin/customer')->as('admin.customer.')->group(function() {
    Route::resource('/', CustomerController::class)->except(['show'])->parameter('', 'customer');

    Route::get('contact-query', [CustomerController::class, 'contactQuery'])->name('contact-query');
    Route::post('{customer}/status-update', [CustomerController::class, 'statusUpdate'])->name('status-update');
    Route::get('customer_subscription', [CustomerController::class, 'customerSubscription'])->name('customer_subscription');
    Route::get('customer_conversation_history', [CustomerController::class, 'customerConversationHistory'])->name('customer_conversation_history');
    Route::get('customer_conversation_logs', [CustomerController::class, 'customerConversationLogs'])->name('customer_conversation_logs');

    Route::get('{subscription}/view-subscription', [CustomerController::class, 'viewSubscription'])->name('view-subscription');


    Route::post('rating-added-by-admin', [CustomerController::class, 'closeActivityByAdmin'])->name('rating-added-by-admin');


});
