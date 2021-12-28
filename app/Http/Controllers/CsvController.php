<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ItemImport;
use App\Exports\ItemExport;
use App\Imports\VendorImport;
use App\Exports\VendorExport;
use App\Imports\PriceImport;
use App\Exports\PriceExport;
use App\Imports\PurchaseImport;
use App\Exports\PurchaseExport;
use App\Imports\ZoneImport;
use App\Exports\ZoneExport;
use App\Imports\UserImport;
use App\Exports\UserExport;
use App\Imports\RequestImport;
use App\Exports\RequestExport;
use App\Imports\RequestEngineerImport;
use App\Exports\RequestEngineerExport;
use App\Imports\ReturnedImport;
use App\Exports\ReturnedExport;
use App\Imports\ReturnsImport;
use App\Exports\ReturnsExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CsvController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportExport()
    {
       return view('file-import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        Excel::import(new ItemImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        return Excel::download(new ItemExport, 'item-collection.xlsx');
    }    

#end of item csv controller



public function vendorImportExport()
{
   return view('vendor-import');
}

/**
* @return \Illuminate\Support\Collection
*/
public function vendorImport(Request $request) 
{
    Excel::import(new VendorImport, $request->file('file')->store('temp'));
    return back();
}

/**
* @return \Illuminate\Support\Collection
*/
public function vendorExport() 
{
    return Excel::download(new VendorExport, 'Vendor-collection.xlsx');
}    



public function priceImportExport()
{
   return view('price-import');
}

/**
* @return \Illuminate\Support\Collection
*/
public function priceImport(Request $request) 
{
    Excel::import(new PriceImport, $request->file('file')->store('temp'));
    return back();
}

/**
* @return \Illuminate\Support\Collection
*/
public function priceExport() 

{
    $prices= DB::table('prices')
    ->join('items', 'items.id', '=', 'item_id')
    ->join('vendors', 'vendors.id', '=','vendor_id')
    ->select('items.name', 'vendors.name AS vendorname', 'price')
    ->get();
    return Excel::download(new PriceExport, 'Price-collection.xlsx');
}    

#end of vendor csv controller



public function purchaseImportExport()
{

   

   return view('purchase-import');
}

/**
* @return \Illuminate\Support\Collection
*/
public function purchaseImport(Request $request) 
{
    Excel::import(new PurchaseImport, $request->file('file')->store('temp'));
    return back();
}

/**
* @return \Illuminate\Support\Collection
*/
public function purchaseExport() 
{


    $purchases= DB::table('purchases')
    ->join('vendors', 'vendors.id', '=','vendor_id')
    ->join('purchase_items', 'purchase_items.item_id', '=','item_id')
    ->join('items', 'items.id', '=','purchase_items.item_id')
    ->select( 'vendors.name AS vendorname', 'PO_number','price', 'quantity', 'purchase_items.item_id', 'items.name AS itemname')
    ->get();
   
    return Excel::download(new PurchaseExport, 'Purchase-collection.xlsx');
}    

#end of purchase csv controller



public function zoneImportExport()
{
   return view('zone-import');
}

/**
* @return \Illuminate\Support\Collection
*/
public function zoneImport(Request $request) 
{
    Excel::import(new ZoneImport, $request->file('file')->store('temp'));
    return back();
}

/**
* @return \Illuminate\Support\Collection
*/
public function zoneExport() 
{
    return Excel::download(new ZoneExport, 'Zone-collection.xlsx');
}    

#end of purchase csv controller


public function userImportExport()
{
   return view('user-import');
}

/**
* @return \Illuminate\Support\Collection
*/
public function userImport(Request $request) 
{
    Excel::import(new UserImport, $request->file('file')->store('temp'));
    return back();
}

/**
* @return \Illuminate\Support\Collection
*/
public function userExport() 
{
    return Excel::download(new UserExport, 'User-collection.xlsx');
}    

#end of purchase csv controller


public function requestImportExport()
{
   return view('request-import');
}

/**
* @return \Illuminate\Support\Collection
*/
public function requestImport(Request $request) 
{
    Excel::import(new RequestImport, $request->file('file')->store('temp'));
    return back();
}

/**
* @return \Illuminate\Support\Collection
*/
public function requestExport() 
{
    return Excel::download(new RequestExport, 'Request-collection.xlsx');
}    

#end of requests csv controller



public function requestengineerImportExport()
{
   return view('requestengineer-import');
}

/**
* @return \Illuminate\Support\Collection
*/
public function requestengineerImport(Request $request) 
{
    Excel::import(new RequestEngineerImport, $request->file('file')->store('temp'));
    return back();
}

/**
* @return \Illuminate\Support\Collection
*/
public function requestengineerExport() 
{
    return Excel::download(new RequestEngineerExport, 'RequestEngineer-collection.xlsx');
}    

#end of requestenineer csv controller



public function returnedImportExport()
{
   return view('returned-import');
}

/**
* @return \Illuminate\Support\Collection
*/
public function returnedImport(Request $request) 
{
    Excel::import(new ReturnedImport, $request->file('file')->store('temp'));
    return back();
}

/**
* @return \Illuminate\Support\Collection
*/
public function returnedExport() 
{
    return Excel::download(new ReturnedExport, 'Returned-collection.xlsx');
}    

#end of requestenineer csv controller


public function returnsImportExport()
{
   return view('returns-import');
}

/**
* @return \Illuminate\Support\Collection
*/
public function returnsImport(Request $request) 
{
    Excel::import(new ReturnsImport, $request->file('file')->store('temp'));
    return back();
}

/**
* @return \Illuminate\Support\Collection
*/
public function returnsExport() 
{
    return Excel::download(new ReturnsExport, 'Returns-collection.xlsx');
}    

#end of requestenineer csv controller


}