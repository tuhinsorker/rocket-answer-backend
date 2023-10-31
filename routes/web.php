<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtisanHttpController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\PayPalPaymentController;

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

Route::get('/', [DashboardController::class, 'redirectToDashboard'])->name('home');
Route::get('/admin', [DashboardController::class, 'redirectToDashboard']);
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/dashboard/get-word-count', [DashboardController::class, 'getWordCount'])->name('admin.dashboard.get-word-count');

Route::get('/admin/dashboard/chartOne', [DashboardController::class, 'chartOne'])->name('admin.dashboard.chartOne');
Route::get('/admin/dashboard/get-pie-chart-data', [DashboardController::class, 'getPieChartData'])->name('admin.dashboard.get-pie-chart-data');

Route::get('lang/{lang}', [LocalizationController::class, 'switchLang'])->name('lang.switch');
Route::get('dev/artisan-http/storage-link', [ArtisanHttpController::class, 'storageLink'])->name('artisan-http.storage-link');

Route::get('/demo/download-demo-file/{file_name}', [DashboardController::class,'downloadDemoFile'])->name('download.demo_file');

// All table imports will be solved by this route for view can check import_file.blade.php and js
Route::post('import-table-list/{cls}', [DashboardController::class,'importFromFile'])->name('import.table_list');


Route::prefix('chart')->as('chart.')->controller(DashboardController::class)->group(function () {
    Route::post('get-date-wise-payment-history', 'getDateWiseTransactionsApi')->name('payment-history');
});


Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');
 
Route::get('stripe', [StripeController::class, 'index']);
Route::get('stripe/cancel', [StripeController::class, 'cancle'])->name('stripe.cancle');

Route::post('stripe/create-charge', [StripeController::class, 'stripePost'])->name('stripe.create-charge');


Route::get('login/{provider}', [SocialController::class, 'redirect']);
Route::get('login/{provider}/callback', [SocialController::class, 'callback']);
