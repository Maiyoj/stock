<?php

namespace App\Imports;

use App\Models\Price;
use Maatwebsite\Excel\Concerns\ToModel;

class PriceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Price([
            //
        ]);
    }
}
