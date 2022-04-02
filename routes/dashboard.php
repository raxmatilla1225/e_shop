<?php

use App\Http\Controllers\Admin\UserController;
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
});

Route::get('login', [UserController::class, 'indexLogin'])->name('login.index');
Route::post('admin-login', [UserController::class, 'adminLogin'])->name('login.admin');

