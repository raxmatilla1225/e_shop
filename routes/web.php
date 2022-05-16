<?php

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


//Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/category/{category}', function (\App\Models\Category $category){
   dump($category->child_categories);
});


Route::get('language/{locale}', function ($locale) {
    if(in_array($locale, config('app.available_locales'))){
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('language');
