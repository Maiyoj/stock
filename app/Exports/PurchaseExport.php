<?php

namespace App\Exports;

use App\Models\Purchase;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;

class PurchaseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $purchases= DB::table('purchases')
    ->join('vendors', 'vendors.id', '=','vendor_id')
    ->join('purchase_items', 'purchase_items.item_id', '=','item_id')
    ->join('items', 'items.id', '=','purchase_items.item_id')
    ->select( 'vendors.name AS vendorname', 'PO_number','price', 'quantity', 'purchase_items.item_id', 'items.name AS itemname', 'purchases.created_at')
    ->get();
   
        return $purchases;
    }
}
