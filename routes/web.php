<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\PageController;
use App\Http\Controllers\Public\SubscriptionController;

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

Auth::routes();


Route::name('public.')->as('public.')->group(function () {
    Route::get('/search-members', [HomeController::class, 'searchMember'])->name('search.member');

    Route::get('/verify-email/{member}/{type}', [HomeController::class, 'verifyEmail'])->name('verify.email');
    Route::post('/verify-email/{member}/{type}', [HomeController::class, 'storeVerifyEmail'])->name('store.verify.email');
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/subscriber/add', [HomeController::class, 'subscriberAdd'])->name('subscriber.add');

    Route::group(['prefix' => 'membership-plans', 'as' => 'membership_plan.', 'controller' => SubscriptionController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show', 'show')->name('show');
    });


    Route::group(['prefix' => 'pages', 'as' => 'page.', 'controller' => PageController::class], function () {
        Route::get('/{slug}', 'show')->name('show');
    });


    Route::get('history', function () {
        return view('public.pages.about.history.index');
    })->name('history');

    Route::get('administration', function () {
        return view('public.pages.about.administration.index');
    })->name('administration');

    Route::get('coming-soon', function () {
        return view('public.pages.comingSoon');
    })->name('coming_soon');

});


//======================== Subscription =========================== >
Route::group(['prefix' => 'subscribe', 'middleware' => 'auth', 'as' => 'subscribe.', 'controller' => SubscriptionController::class], function () {
    Route::get('/day/{tournament}', 'dayPlan')->name('day');
});
