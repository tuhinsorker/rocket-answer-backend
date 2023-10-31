<?php

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

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Modules\Expert\Entities\ExpertDocument;
use Modules\Expert\Entities\ExpertPayAccount;
use Modules\Expert\Entities\ExpertReview;
use Modules\Expert\Entities\ExpertWithdrawRequest;
use Modules\Expert\Http\Controllers\DocTypeController;
use Modules\Expert\Http\Controllers\ExpertCategoryController;
use Modules\Expert\Http\Controllers\ExpertController;
use Modules\Expert\Http\Controllers\ExpertDocumentController;
use Modules\Expert\Http\Controllers\ExpertEducationController;
use Modules\Expert\Http\Controllers\ExpertJobController;
use Modules\Expert\Http\Controllers\ExpertPayAccountController;
use Modules\Expert\Http\Controllers\ExpertReviewController;
use Modules\Expert\Http\Controllers\ExpertSubcategoryController;
use Modules\Expert\Http\Controllers\ExpertWithdrawRequestController;
use Modules\Expert\Http\Controllers\PaymentTransactionController;

Route::prefix('admin')->middleware(['auth'])->group(function ()
{

    Route::prefix('expert')->as('expert.')->controller(ExpertController::class)->group(function() {
        Route::post('/', 'store')->name('store');
        Route::put('/', 'update')->name('update');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/top-experts', 'top_experts')->name('top-experts');
        Route::get('/lowest-experts', 'lowest_experts')->name('lowest-experts');
        Route::get('/expert-pending-sessions', 'expertPendingSessions')->name('expert-pending-sessions');
        Route::get('/{status?}', 'index')->name('index');
        Route::get('/show/{id}/{status?}', 'show')->name('show');
        Route::delete('/{expert}', 'destroy')->name('destroy');
    });

    Route::prefix('expert-category')->as('expert-category.')->controller(ExpertCategoryController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::put('/', 'update')->name('update');
        Route::delete('/{expertCategory}', 'destroy')->name('destroy');
    });

    Route::prefix('expert-sub-category')->as('expert-sub-category.')->controller(ExpertSubcategoryController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::put('/', 'update')->name('update');
        Route::delete('/{expertSubCategory}', 'destroy')->name('destroy');
        Route::get('getsubcatByCat', 'getsubcatByCat')->name('getsubcatByCat');
    });

    Route::prefix('expert-doc-type')->as('expert-doc-type.')->controller(DocTypeController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::put('/', 'update')->name('update');
        Route::delete('/{expertCategory}', 'destroy')->name('destroy');
    });

    Route::prefix('expert-document')->as('expert-document.')->controller(ExpertDocumentController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/', 'update')->name('update');
        Route::delete('/{expertDocument}', 'destroy')->name('destroy');
    });

    Route::prefix('expert-education')->as('expert-education.')->controller(ExpertEducationController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/', 'update')->name('update');
        Route::delete('/{expertEducations}', 'destroy')->name('destroy');
    });

    Route::prefix('expert-job')->as('expert-job.')->controller(ExpertJobController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/', 'update')->name('update');
        Route::delete('/{expertJob}', 'destroy')->name('destroy');
    });

    Route::prefix('expert-pay-account')->as('expert-pay-account.')->controller(ExpertPayAccountController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::put('/', 'update')->name('update');
        Route::delete('/{expertPayAccount}', 'destroy')->name('destroy');
    });

    Route::prefix('expert-review')->as('expert-review.')->controller(ExpertReviewController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::put('/', 'update')->name('update');
        Route::delete('/{expertReview}', 'destroy')->name('destroy');
    });

    Route::prefix('expert-payment-setup')->as('expert-payment-setup.')->controller(ExpertPaymentSetupController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::put('/', 'update')->name('update');
        Route::delete('/{expertPaymentSetup}', 'destroy')->name('destroy');
    });

    Route::prefix('expert-withdraw-request')->as('expert-withdraw-request.')->controller(ExpertWithdrawRequestController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/edit', 'edit')->name('edit');
        Route::get('/show/{id}', 'show')->name('show');
        Route::put('/', 'update')->name('update');
        Route::post('status-update', 'statusUpdate')->name('status-update');
        Route::delete('/{expertWithDrawRequest}', 'destroy')->name('destroy');
    });

    Route::prefix('payment-transaction')->as('payment-transaction.')->controller(PaymentTransactionController::class)->group(function() {

        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::post('/create-payment-transaction', 'createPaymentTransaction')->name('create-payment-transaction');
        Route::get('/create/{withdraw_request_id}', 'create')->name('create');
        Route::get('/edit', 'edit')->name('edit');
        Route::get('/show/{id}', 'show')->name('show');
        Route::put('/', 'update')->name('update');
        Route::post('status-update', 'statusUpdate')->name('status-update');
        Route::delete('/{paymentTransaction}', 'destroy')->name('destroy');
    });

});


