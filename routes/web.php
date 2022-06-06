<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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
// Auth::routes(['verify' => true]);

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/', function () {
    return view('pages.index');
});

// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->middleware('auth');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth','verified','check-status']], function () {
    Route::get('/', function(){
        return view('admin.index');
    });
    Route::get('user/profile/{user}', [App\Http\Controllers\UsersController::class, 'show'])->name('profile');
    Route::put('user/profile/{user}', [App\Http\Controllers\UsersController::class, 'updateProfile'])->name('update-profile');
    Route::put('user/change-password/{user}', [App\Http\Controllers\UsersController::class, 'changePassword'])->name('change-password');


    Route::group(['prefix' => 'user', 'middleware' => ['check-role']], function () {
        Route::get('/index', [App\Http\Controllers\UsersController::class, 'index'])->name('list-all-user');
        Route::get('/create', [App\Http\Controllers\UsersController::class, 'create'])->name('create-user');
        Route::post('/store', [App\Http\Controllers\UsersController::class, 'store'])->name('store-user');  
        Route::get('/edit/{user}', [App\Http\Controllers\UsersController::class, 'edit'])->name('edit-user'); 
        Route::put('/update/{user}', [App\Http\Controllers\UsersController::class, 'update'])->name('update-user-profile');  
        Route::delete('/destroy/{user}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('destroy-user');
        Route::put('/handle/{user}', [App\Http\Controllers\UsersController::class, 'handle'])->name('handle-user');
    });
   
    Route::group(['prefix' => 'crawl-history', 'middleware' =>['check-role']], function(){
        Route::get('/index', [App\Http\Controllers\CrawlHistoriesController::class, 'index'])->name('list-all-history');
        Route::get('/show-error{id}', [App\Http\Controllers\CrawlHistoriesController::class, 'show'])->name('show-error');
    });

    Route::group(['prefix' =>'category','middleware' => ['check-role']], function(){
        Route::get('/index',[App\Http\Controllers\CategoriesController::class, 'index'])->name('list-all-category');
        Route::get('/create',[App\Http\Controllers\CategoriesController::class, 'create'])->name('show-create-category');
        Route::get('/edit/{category}',[App\Http\Controllers\CategoriesController::class, 'edit'])->name('edit-category');
        Route::put('/update/{category}',[App\Http\Controllers\CategoriesController::class, 'update'])->name('update-category');
        Route::post('/store',[App\Http\Controllers\CategoriesController::class, 'store'])->name('store-category');
        Route::delete('/destroy/{category}',[App\Http\Controllers\CategoriesController::class, 'destroy'])->name('destroy-category');
    });

    Route::group(['prefix' =>'post'], function(){
        Route::get('/index',[App\Http\Controllers\PostsController::class, 'index'])->name('list-all-post');
        Route::get('/create',[App\Http\Controllers\PostsController::class, 'create'])->name('show-create-post');
        Route::get('/edit/{post}',[App\Http\Controllers\PostsController::class, 'edit'])->name('edit-post');
        Route::put('/update/{post}', [App\Http\Controllers\PostsController::class, 'update'])->name('update-post');  
        Route::post('/store',[App\Http\Controllers\PostsController::class, 'store'])->name('store-post');
        Route::delete('/destroy/{post}',[App\Http\Controllers\PostsController::class, 'destroy'])->name('destroy-post');
    });

    Route::group(['prefix' =>'banner'], function(){
        Route::get('/index',[App\Http\Controllers\BannersController::class, 'index'])->name('list-all-banner');
        Route::get('/create',[App\Http\Controllers\BannersController::class, 'create'])->name('show-create-banner');
        Route::get('/edit/{banner}',[App\Http\Controllers\BannersController::class, 'edit'])->name('edit-banner');
        Route::put('/update/{banner}', [App\Http\Controllers\BannersController::class, 'update'])->name('update-banner');  
        Route::post('/store',[App\Http\Controllers\BannersController::class, 'store'])->name('store-banner');
        Route::delete('/destroy/{banner}',[App\Http\Controllers\BannersController::class, 'destroy'])->name('destroy-banner');
        Route::put('/handle/{banner}', [App\Http\Controllers\BannersController::class, 'handle'])->name('handle-banner');
    });

    Route::group(['prefix' =>'ads'], function(){
        Route::get('/index',[App\Http\Controllers\AdsController::class, 'index'])->name('list-all-ad');
        Route::get('/create',[App\Http\Controllers\AdsController::class, 'create'])->name('show-create-ad');
        Route::get('/edit/{ad}',[App\Http\Controllers\AdsController::class, 'edit'])->name('edit-ad');
        Route::put('/update/{ad}', [App\Http\Controllers\AdsController::class, 'update'])->name('update-ad');  
        Route::post('/store',[App\Http\Controllers\AdsController::class, 'store'])->name('store-ad');
        Route::delete('/destroy/{ad}',[App\Http\Controllers\AdsController::class, 'destroy'])->name('destroy-ad');
        Route::put('/handle/{ad}', [App\Http\Controllers\AdsController::class, 'handle'])->name('handle-ad');
    });
});



Route::prefix('tours')->group(function () {
    Route::get('/index', [App\Http\Controllers\ToursController::class, 'index']);
    Route::get('/search', [App\Http\Controllers\ToursController::class, 'search'])
        ->name('search-tours');
});

Route::prefix('blog')->group(function () {
    Route::get('/index',[App\Http\Controllers\PostsController::class, 'indexPage'])->name('show-blog');
    Route::get('/post/{slug}',[App\Http\Controllers\PostsController::class, 'show'])->name('show-blog-post');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
