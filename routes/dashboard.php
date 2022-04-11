<?php

use App\Http\Controllers\Admin\ProvinceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['adminAuth'])->group(function (){
    Route::get('/', function () {
        return view('admin.dashboard.index');
    })->name('admin.dashboard.index');
    Route::resource('users', UserController::class);

    Route::resource('news', NewsController::class);
    Route::resource('news_cat', NewsCategoryController::class);
    Route::resource('authors', AuthorController::class);

    Route::resource('provinces', ProvinceController::class);
    Route::get('language/{locale}', function ($locale) {
      if(in_array($locale, config('app.available_locales'))){
          session()->put('locale', $locale);
      }
        return redirect()->back();
    })->name('language');
});

Route::get('login', [UserController::class, 'indexLogin'])->name('login.index');
Route::post('admin-login', [UserController::class, 'adminLogin'])->name('login.admin');

Route::resource('client', ClientController::class);
