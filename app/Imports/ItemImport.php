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
            'id'     => $row[0],
            'type'    => $row[1],
            'name'    => $row[2],
            'description' => $row[3],
            'units'    => $row[4],
            'sku'    => $row[5],
            'updated_at'    => $row[6],
            'created_at'    => $row[7],
            
          

    



        ]);
    }
}
