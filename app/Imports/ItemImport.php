<?php

namespace App\Imports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class ItemImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Item([
            'type'     => $row[0],
            'name'    => $row[1],
            'description'    => $row[2],
            'units'    => $row[3],
            'sku'    => $row[4],
            'dateadded'    => $row[5],



        ]);
    }
}
