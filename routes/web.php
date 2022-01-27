<?php
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PmController;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ApproveController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReturnsController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\IssuanceController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\ReturnedController;
use App\Http\Controllers\IssuanceeController;
use App\Http\Controllers\IssuancesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\EngineerReportController;
use App\Http\Controllers\RequestEngineercontroller;
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



Route::resource('/permissions', PermissionController::class);
Route::resource('/roles', RolesController::class);
Route::resource('/vendor', VendorController::class);
Route::resource('/item', ItemController::class);
Route::resource('/purchase', PurchaseController::class)->except('deliveryNote');
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
Route::resource('/approve', ApproveController::class);
Route::resource('/comments', CommentController::class);
Route::resource('/request', RequestsController::class)->except('drafts');
Route::resource('/approval', ApprovalController::class);
Route::resource('/requestengineer', RequestEngineercontroller::class)->except('drafts');

Route::get('/req-drafts',[RequestEngineercontroller::class,'drafts'])->name('requests.drafts');
Route::get('/drafts',[RequestsController::class,'drafts'])->name('request.drafts');

Route::get('/stocks',[StockController::class,'index'])->name('stocks.index');
Route::get('/teamleadstocks',[StockController::class,'teamleadstocks'])->name('teamleadstocks.index');
Route::get('/engineeer-stocks',[StockController::class,'engineerstocks'])->name('myissuancee.index');





Auth::routes();


Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');
Route::get('/home', [App\Http\Controllers\FrontController::class, 'index'])->name('home.index');


//directs to user layoutt
Route::get('/home', [App\Http\Controllers\FrontController::class, 'index'])->name('home.index');
Route::get('/pm', [App\Http\Controllers\PmController::class, 'index'])->name('pm.index');
//pm approval
Route::get('/pm-request/{id}',[PmController::class,'approve'])->name('pm.approve');
Route::get('/reject/{id}',[PmController::class,'reject'])->name('pm.reject');
Route::get('/pm.draft/{id}',[PmController::class,'draft'])->name('pm.draft');
Route::get('/pm.drafts/{id}',[PmController::class,'drafts'])->name('pm.drafts');
//requsetengineer approvee
Route::get('/approvee-requestengineer/{id}',[PmController::class,'approvee'])->name('requestengineer.approvee');

Route::get('/approve-request/{id}',[HomeController::class,'approve'])->name('request.approve');
Route::get('/pm.reject/{id}',[HomeController::class,'reject'])->name('request.reject');
#engineer approval
Route::get('/approval-requestengineer/{id}',[HomeController::class,'approval'])->name('requestengineer.approval');
Route::get('/rejected/{id}',[HomeController::class,'rejected'])->name('requestengineer.rejected');


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




//adding more than item routes

Route::post('add-item',[HomeController::class,'purchase'])->name('item.add');
Route::get('remove-item/{id}',[HomeController::class,'remove'])->name('item.remove');
Route::get('item-complete',[HomeController::class,'complete'])->name('items.complete');

Route::post('add-request',[HomeController::class,'request'])->name('request.add');
Route::get('remove-request/{id}',[HomeController::class,'removerequest'])->name('request.remove');
Route::get('request-complete',[HomeController::class,'completerequest'])->name('request.complete');

Route::post('add-e_request',[HomeController::class,'e_request'])->name('e_request.add');
Route::get('remove-e_request/{id}',[HomeController::class,'removee_request'])->name('e_request.remove');
Route::get('e_request-complete',[HomeController::class,'completee_request'])->name('e_request.complete');

//Edit purchase
Route::get('purchase-item/{id}',[HomeController::class,'purchaseitemremove'])->name('purchase-item.remove');
Route::post('purchase-item-add/{id}',[HomeController::class,'purchaseitemadd'])->name('purchase-item.add');
Route::post('purchase-update/{id}',[HomeController::class,'purchaseupdate'])->name('purchase-items.update');

//csv and excel controller
Route::get('file-import-export', [CsvController::class, 'csv.fileImportExport']);
Route::post('file-import', [CsvController::class, 'fileImport'])->name('csv.file-import');
Route::get('file-export', [CsvController::class, 'fileExport'])->name('csv.file-export');


//vendor csv route
Route::get('vendor-import-export', [CsvController::class, 'csv.vendorImportExport']);
Route::post('vendor-import', [CsvController::class, 'vendorImport'])->name('csv.vendor-import');
Route::get('vendor-export', [CsvController::class, 'vendorExport'])->name('csv.vendor-export');

//price csv route
Route::get('price-import-export', [CsvController::class, 'csv.priceImportExport']);
Route::post('price-import', [CsvController::class, 'priceImport'])->name('csv.price-import');
Route::get('price-export', [CsvController::class, 'priceExport'])->name('csv.price-export');

//purchases csv route
Route::get('purchase-import-export', [CsvController::class, 'purchaseImport']);
Route::post('purchase-import', [CsvController::class, 'purchaseImportStore'])->name('csv.purchase-import');
Route::get('purchase-export', [CsvController::class, 'purchaseExport'])->name('csv.purchase-export');



//zones csv route
Route::get('zone-import-export', [CsvController::class, 'csv.zoneImportExport']);
Route::post('zone-import', [CsvController::class, 'zoneImport'])->name('csv.zone-import');
Route::get('zone-export', [CsvController::class, 'zoneExport'])->name('csv.zone-export');

//  user csv route
Route::get('user-import-export', [CsvController::class, 'csv.userImportExport']);
Route::post('user-import', [CsvController::class, 'userImport'])->name('csv.user-import');
Route::get('user-export', [CsvController::class, 'userExport'])->name('csv.user-export');


// request csv route
Route::get('request-import-export', [CsvController::class, 'csv.requestImportExport']);
Route::post('request-import', [CsvController::class, 'requestImport'])->name('csv.request-import');
Route::get('request-export', [CsvController::class, 'requestExport'])->name('csv.request-export');

// requestengineer csv route
Route::get('requestengineer-import-export', [CsvController::class, 'csv.requestengineerImportExport']);
Route::post('requestengineer-import', [CsvController::class, 'requestengineerImport'])->name('csv.requestengineer-import');
Route::get('requestengineer-export', [CsvController::class, 'requestengineerExport'])->name('csv.requestengineer-export');

// returned csv route
Route::get('returned-import-export', [CsvController::class, 'csv.returnedImportExport']);
Route::post('returned-import', [CsvController::class, 'returnedImport'])->name('csv.returned-import');
Route::get('returned-export', [CsvController::class, 'returnedExport'])->name('csv.returned-export');
// returns csv route
Route::get('returns-import-export', [CsvController::class, 'csv.returnsImportExport']);
Route::post('returns-import', [CsvController::class, 'returnsImport'])->name('csv.returns-import');
Route::get('returns-export', [CsvController::class, 'returnsExport'])->name('csv.returns-export');



/*middleware routes
Route::group(['middleware' => ['auth', 'appstrict']], function () {
    Route::resource('/item', ItemController::class);
    Route::resource('/vendor', VendorController::class);
    Route::resource('/purchase', PurchaseController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/zone', ZoneController::class);
    Route::resource('/price', PriceController::class);
  

    Route::get('/stocks',[StockController::class,'index'])->name('stocks.index');

         
    
     #purchase controller

    Route::post('add-item',[HomeController::class,'purchase'])->name('item.add');
    Route::get('remove-item/{id}',[HomeController::class,'remove'])->name('item.remove');
    Route::get('item-complete',[HomeController::class,'complete'])->name('items.complete');

});
*/
//delete of more than one items

Route::delete('/item-deleteall', [ItemController::class, 'deleteAll'])->name('item.delete');
Route::delete('/vendor-deleteall', [VendorController::class, 'All'])->name('vendor.delete');
Route::delete('/price-deleteall', [PriceController::class, 'deleteAll'])->name('price.delete');
Route::delete('/purchase-deleteall', [PurchaseController::class, 'deleteAll'])->name('purchase.delete');
Route::delete('/zone-deleteall', [ZoneController::class, 'deleteAll'])->name('zone.delete');
Route::delete('/user-deleteall',[UserController::class, 'deleteAll'])->name('user.delete');


//pdf reports


Route::get('/purchase-pdf/{id}', [  PdfController::class, 'purchase'])->name('purchase-pdf');
Route::get('/purchases-pdf', [  PdfController::class, 'purchases'])->name('purchases-pdf');
Route::get('/items-pdf', [PdfController::class, 'index'])->name('items-pdf');
Route::get('/vendor-pdf', [PdfController::class, 'vendor'])->name('vendor-pdf');
Route::get('/price-pdf', [PdfController::class, 'price'])->name('price-pdf');
Route::get('/requests-pdf', [  PdfController::class, 'requests'])->name('requests-pdf');

Route::get('/delivery-note/{id}',[PurchaseController::class,'deliveryNote'])->name('delivery_note');

Route::resource('/engineer_reports',EngineerReportController::class);

Route::get('/request_item_edit/{id}',[EditController::class,'editrequestitem'])->name('request_item.edit');
Route::post('/request_item_update/{id}',[EditController::class,'updaterequestitem'])->name('request_item.update');
Route::post('/request_item_delete/{id}',[EditController::class,'deleterequestitem'])->name('request_item.delete');
Route::post('/request_item_add/{id}',[EditController::class,'addrequestitem'])->name('request_item.add');
Route::post('/request-updates/{id}',[EditController::class,'updaterequestitems'])->name('request_items.update');

Route::get('/request_edit_edit/{id}',[EditController::class,'editrequest'])->name('request_edit.edit');
Route::post('/request_edit_update/{id}',[EditController::class,'updaterequest'])->name('request_edit.update');
Route::post('/request_edit_delete/{id}',[EditController::class,'deleterequest'])->name('request_edit.delete');
Route::post('/request_edit_add/{id}',[EditController::class,'addrequest'])->name('request_edit.add');
Route::post('/request-update/{id}',[EditController::class,'updaterequestteam'])->name('request_edits.update');



