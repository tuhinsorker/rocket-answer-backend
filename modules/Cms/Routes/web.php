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

use Illuminate\Support\Facades\Route;
use Modules\Cms\Http\Controllers\CmsController;
use Modules\Cms\Http\Controllers\PageController;
use Modules\Cms\Http\Controllers\PostController;
use Modules\Cms\Http\Controllers\TestimonialController;
use Modules\Cms\Http\Controllers\MideaLibraryController;
use Modules\Cms\Http\Controllers\PostCategoryController;
use Modules\Cms\Http\Controllers\TeamMemberController;

Route::middleware('auth','web')->group(function () {


    Route::prefix('cms')->as('cms.')->group(function() {

        Route::resource('testimonial', TestimonialController::class);
        Route::get('delete-testimonial/{id}', 'TestimonialController@destroy')->name('delete-testimonial');

        Route::get('how-it-work', 'TestimonialController@howItWork')->name('how-it-work');
        Route::post('how-it-work-store', 'TestimonialController@howItWorkStore')->name('how-it-work-store');
        Route::get('how-it-work-edit/{id}', 'TestimonialController@howItWorkEdit')->name('how-it-work-edit');
        Route::put('how-it-work-update/{id}', 'TestimonialController@howItWorkUpdate')->name('how-it-work-update');
        Route::get('how-it-work-delete/{id}', 'TestimonialController@howItWorkDelete')->name('how-it-work-delete');






        Route::resource('posts', PostController::class);
        Route::resource('categories', PostCategoryController::class);
        Route::get('delete-category/{id}', 'PostCategoryController@destroy')->name('delete-category');


        Route::get('delete-post/{id}', 'PostController@destroy')->name('delete-post');
        Route::get('get-post-list', 'PostController@getPost')->name('get-post-list');
        Route::post('{post}/post-status-update', [PostController::class, 'statusUpdate'])->name('post-status-update');


        Route::resource('pages', PageController::class);
        Route::get('delete-page/{id}', 'PageController@destroy')->name('delete-page');
        Route::get('get-page-list', 'PageController@getPost')->name('get-page-list');
        Route::post('{page}/page-status-update', [PageController::class, 'statusUpdate'])->name('page-status-update');


        Route::resource('websetup', WebsetupController::class);
        Route::post('update-setup', 'WebsetupController@updateSetup')->name('update-setup');

        Route::get('social-link', 'WebsetupController@socialLink')->name('social-link');
        Route::post('update-social-link', 'WebsetupController@updateSocialLink')->name('update-social-link');

        Route::get('privacy-policy-setup', 'CmsController@privacyPolicy')->name('privacy-policy-setup');
        Route::post('privacy-policy-update', 'CmsController@updatePrivacyPolicy')->name('privacy-policy-update');

        Route::get('landing-page-setup', 'CmsController@landingPageSetup')->name('landing-page-setup');
        Route::post('landing-page-setup-update', 'CmsController@updateLandingPageSetup')->name('landing-page-setup-update');

        Route::get('add-terms-of-service', 'CmsController@termsofService')->name('add-terms-of-service');
        Route::post('terms-of-service-update', 'CmsController@updateTermsofService')->name('terms-of-service-update');

        Route::prefix('team-member')->as('team-member.')->controller(TeamMemberController::class)->group(function() {

            Route::get('/', 'index')->name('index');
            Route::post('/', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');

        });

    });



});
