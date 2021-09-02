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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReturnedController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ReturnsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IssuanceController;




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
Route::resource('/profile', ProfileController::class);
Route::resource('/returned', ReturnedController::class);
Route::resource('/price', PriceController::class);
Route::resource('/returned', ReturnedController::class);
Route::resource('/returns', ReturnsController::class);



Route::get('/stocks',[StockController::class,'index'])->name('stocks.index');
Route::get('/teamleadstocks',[StockController::class,'teamleadstocks'])->name('teamleadstocks.index');
Route::get('/engineeer-stocks',[StockController::class,'engineerstocks'])->name('myissuancee.index');




Auth::routes();


Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');



#routes for reports
Route::get('/items-reports', [App\Http\Controllers\HomeController::class, 'itemreport'])->name('reports.itemreport');
Route::get('/vendors-reports', [App\Http\Controllers\HomeController::class, 'vendorreport'])->name('reports.vendorreport');
Route::get('/prices-reports', [App\Http\Controllers\HomeController::class, 'pricereport'])->name('reports.pricereport');
Route::get('/purchases-reports', [App\Http\Controllers\HomeController::class, 'purchasereport'])->name('reports.purchasereport');
Route::get('/zones-reports', [App\Http\Controllers\HomeController::class, 'zonereport'])->name('reports.zonereport');
Route::get('/issuances-reports', [App\Http\Controllers\HomeController::class, 'issuancereport'])->name('reports.issuancereport');
Route::get('/issuancees-reports', [App\Http\Controllers\HomeController::class, 'issuanceereport'])->name('reports.issuanceereport');
Route::get('/returns-reports', [App\Http\Controllers\HomeController::class, 'returnreport'])->name('reports.returnreport');
Route::get('/returneds-reports', [App\Http\Controllers\HomeController::class, 'returnedreport'])->name('reports.returnedreport');