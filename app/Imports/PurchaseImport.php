<?php

namespace App\Imports;

use App\Models\Purchase;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class PurchaseImport 
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Purchase::create([
                'vendor_id' => $row['vendor_id'],
                'PO_number' => $row['PONumber'],
                'price'     => $row['price'],
                'date'      => $row['date']
            ]);
        }
    }
    public function rules(): array
    {
        return [
            'vendor_id' => 'integer|required',
            'PO_number' => 'string|required',
            'price'     => 'integer|required',
            'date'      => 'date|required'
        ];
    }
}
