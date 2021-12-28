<?php

namespace App\Exports;

use App\Models\Price;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
class PriceExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $prices= DB::table('prices')
        ->join('items', 'items.id', '=', 'item_id')
        ->join('vendors', 'vendors.id', '=','vendor_id')
        ->select('items.name', 'vendors.name AS vendorname', 'price')
        ->get();
        return $prices;
    }


    public function headings(): array
    {
        return [

            
            
            'Vendor',
            'Item',
            'Price',
            'Date',
            
        ];
    }
}
