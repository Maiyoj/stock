<?php

namespace App\Imports;

use App\Models\Returned;
use Maatwebsite\Excel\Concerns\ToModel;

class ReturnedImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Returned([
            //
        ]);
    }
}
