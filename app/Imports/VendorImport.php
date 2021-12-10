<?php

namespace App\Imports;

use App\Models\Vendor;
use Maatwebsite\Excel\Concerns\ToModel;

class VendorImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Vendor([

            'title'     => $row[0],
            'name'    => $row[1],
            'email'    => $row[2],
            'number'    => $row[3],
            'address'    => $row[4],
            'country'    => $row[5],
            'dateadded'    => $row[6],



        
        ]);
    }
}
