<?php

namespace App\Exports;

use App\Models\Purchase;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PurchaseExport implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

    $purchases= DB::table('purchases')->where('purchases.deleted_at',null)
    ->join('vendors', 'vendors.id', '=','vendor_id')
    ->select('purchases.id AS id','vendors.name AS vendorname', 'PO_number','price','date')
    ->get();
        return $purchases;
    }
    public function headings(): array
    {
            return[
                "Purchase ID","Vendor","Purchase PO Number","Total Price","Date"
            ];
    }
}
