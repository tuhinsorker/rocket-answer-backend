<?php

use App\Http\Controllers\Api\CustomerApi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ExpertApi;
use App\Http\Controllers\Api\GeneralApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\SettingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/', function () {
    return sendSuccessResponse('Please Login first','',200);
});

Route::controller(SettingController::class)->group(function () {
    Route::get('settings', 'settings');
    Route::get('webSettings', 'webSettings');
});

Route::controller(ExpertApi::class)->group(function () {
    Route::get('country_list', 'country_list');
    Route::get('expert_categories', 'expert_categories');
    Route::get('card_type', 'card_type');
    Route::get('doc_type', 'doc_type');
});

Route::controller(ExpertApi::class)->group(function () {

    Route::middleware('auth:jwt_auth')->group(function () {


        Route::post('update_expert_info', 'update_expert_info');
        Route::post('update_expert_education', 'update_expert_education');
        Route::post('update_expert_document', 'update_expert_document');
        Route::post('update_expert_job', 'update_expert_job');

        Route::get('transections', 'transections');
        Route::get('top_customers', 'top_customers');
        Route::get('dashboard', 'dashboard');
        Route::get('expert_payment_setup', 'expert_payment_setup');

        Route::post('withdraw_request', 'withdraw_request');
        Route::get('withdraw_request_list', 'withdraw_request_list');
        Route::get('withdraw_request_details', 'withdraw_request_details');
        Route::post('pay_accounts', 'pay_accounts');
        Route::get('pay_account_info', 'pay_account_info');
        Route::get('payment_methods', 'payment_methods');
        Route::get('conversetion', 'conversetion');
        Route::get('conversetion_details', 'conversetion_details');
        Route::post('online_offline', 'online_offline');

        Route::get('notifications', 'notifications');
        Route::get('total-unread-notifications', 'getTotalUnreadNotificationCount');
        Route::post('notification-seen-all-total', 'notificationSeenAllTotal');
        Route::post('read-all-notification', 'readAllNotification');
        Route::post('notifications/{id}', 'makeNotificationRead');

    });

});

Route::controller(AuthController::class)->group(function () {

    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('reset_pasword', 'reset_pasword');
    Route::post('forgot_password', 'forgot_password');

});

Route::controller(AuthController::class)->group(function () {

    Route::middleware('auth:jwt_auth')->group(function () {
        Route::post('update_password', 'update_password');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
        Route::get('profile', 'profile');
        Route::post('update_profile', 'update_profile');

    });

});



Route::prefix('customer')->as('customer.')->controller(AuthController::class)->group(function() {

    Route::middleware('auth:jwt_auth')->group(function () {

        Route::post('update_password', 'update_password');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
        Route::get('profile', 'profile');
        Route::post('update_profile', 'update_profile');

    });

    Route::post('login', 'customerLogin');
    Route::post('customer_register', 'customer_register');
    Route::post('updateCustomerProfile', 'updateCustomerProfile');
    Route::post('reset_pasword', 'reset_pasword');
    Route::post('forgot_password', 'forgot_password');

});


Route::prefix('customer')->as('customer.')->controller(CustomerApi::class)->group(function() {

    Route::middleware('auth:jwt_auth')->group(function () {
        Route::get('checkToken', 'checkToken');

        Route::get('myPackages', 'myPackages');
        Route::get('myPackageDetails', 'myPackageDetails');
        Route::get('cancelSubscription', 'cancelSubscription');
        Route::post('buyPackage', 'buyPackage');
        Route::get('consultantHstory', 'consultantHstory');
        Route::get('consultantDetails', 'consultantDetails');
        Route::get('paymentHistory', 'paymentHistory');

    });


    Route::get('landingPage', 'landingPage');
    Route::get('expertCategories', 'expertCategories');
    Route::get('categoriyWaisExpert', 'categoriyWaisExpert');
    Route::get('topExperts', 'topExperts');
    Route::get('testimonials', 'testimonials');
    Route::get('howitwork', 'howitwork');
    Route::get('about-us', 'aboutUs');
    Route::post('submit-contact-query', 'submitContactQuery');
    Route::get('packageList', 'packageList');
    Route::get('packageDetails', 'packageDetails');

    Route::get('blogCategory', 'blogCategory');
    Route::get('blogPost', 'blogPost');
    Route::get('blogPostDetails', 'blogPostDetails');
    Route::get('checkGmailLogin', 'checkGmailLogin');
    Route::get('paypalAccount', 'paypalAccount');
    Route::get('paymentMethod', 'paymentMethod');
    Route::get('predefinedAnswer', 'predefinedAnswer');
    Route::get('checkEmail', 'checkEmail');
    Route::post('customerPaymentIntents', 'customerPaymentIntents');


});



Route::prefix('general')->as('general.')->controller(GeneralApiController::class)->group(function() {

    Route::post('file-upload', 'uploadFile');
    Route::get('user-info', 'experCustomerDetail');
    Route::post('get_stripe_event', 'get_stripe_event');
    Route::get('create_stripe_subscription', 'create_stripe_subscription');
    Route::get('category-wise-online-experts', 'categoryWiseOnlineExperts');



    Route::middleware('auth:jwt_auth')->group(function () {

        Route::post('add_stripe_methods', 'addCustomerPaymentMethod');
        Route::post('update_stripe_payment_methods', 'updateCustomerPaymentMethod');
        Route::post('delete_stripe_payment_method', 'deleteCustomerPaymentMethod');


        Route::get('get_stripe_methods', 'customerPaymentMethodList');
        Route::post('close-activity', 'closeActivity');
        Route::post('close-activity-by-customer', 'closeActivityByCustomer');
        Route::get('conversation-details', 'conversationDetails');
    });

});

