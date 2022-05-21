<?php

use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\AuthController;
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

Route::view('/contact', 'electro/contact')->name('contact');
Route::view('/order', 'electro/order')->name('order');
Route::view('/compare', 'electro/shop/compare')->name('compare');
Route::view('/wishlist', 'electro/shop/wishlist')->name('wishlist');
Route::view('/cart', 'electro/shop/cart')->name('cart');
Route::view('/checkout', 'electro/shop/checkout')->name('checkout');
Route::view('/shop', 'electro/shop/shop')->name('shop');
Route::view('/single_product', 'electro/shop/single_product')->name('single.product');
Route::view('/terms_&_conditions', 'electro/shop/terms_&_conditions')->name('terms.&.conditions');
Route::view('/faq', 'electro/shop/faq')->name('faq');

Route::get('/category/{category}', function (\App\Models\Category $category){
   dump($category->child_categories);
});


Route::get('language/{locale}', function ($locale) {
    if(in_array($locale, config('app.available_locales'))){
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('language');

Route::middleware(['clientAuth'])->group( function () {
//    Route::get('product/search', [ClientController::class, 'search'])->name('product.search');
    Route::get('/my_account', [ClientController::class, 'my_account'])->name('my_account');
});

//Route::get('/account', function (){
//    dd("Your account");
//})->middleware('clientAuth');

Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('confirm', [AuthController::class, 'confirm'])->name('auth.confirm');


