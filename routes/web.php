<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\IssuancesController;
use App\Http\Controllers\IssuanceeController;
use App\Http\Controllers\EngineerIssuanceeController;



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
    return view('auth.login');
});




Route::resource('/item', ItemController::class);
Route::resource('/vendor', VendorController::class);
Route::resource('/purchase', PurchaseController::class);
Route::resource('/user', UserController::class);
Route::resource('/zone', ZoneController::class);
Route::resource('/issuance',IssuancesController::class);
Route::resource('/issuancee',IssuanceeController::class);
Route::resource('/engineer-issuancee',EngineerIssuanceeController::class);


Route::get('/stocks',[StockController::class,'index'])->name('stocks.index');
Route::get('/teamleadstocks',[StockController::class,'teamleadstocks'])->name('teamleadstocks.index');
Route::get('/engineeer-stocks',[StockController::class,'engineerstocks'])->name('myissuancee.index');




Auth::routes();


Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');
#Route::get('/passwords/reset', 'Auth\ResetPasswordController@resetPassword')->name('passwords.reset');
#Route::get('Auth/passwords/reset/{token}', 'ResetPasswordController@showResetForm')->name('passwords.reset');



