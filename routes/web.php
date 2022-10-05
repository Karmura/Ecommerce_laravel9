<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class,'index']);
    Route::get('create',[App\Http\Controllers\Admin\DashboardController::class,'create']);
    Route::post('store',[App\Http\Controllers\Admin\DashboardController::class,'store']);
    Route::delete('delete/{id}',[App\Http\Controllers\Admin\DashboardController::class,'destroy']);
    Route::get('edit/{id}',[App\Http\Controllers\Admin\DashboardController::class,'edit']);

    Route::get('deletemovie/{id}',[App\Http\Controllers\Admin\DashboardController::class,'deletemovie']);
    Route::get('deletecover/{id}',[App\Http\Controllers\Admin\DashboardController::class,'deletecover']);

    Route::put('update/{id}',[App\Http\Controllers\Admin\DashboardController::class,'update']);

});
