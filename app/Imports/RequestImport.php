<?php

namespace App\Imports;

use App\Models\Request;
use Maatwebsite\Excel\Concerns\ToModel;

class RequestImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Request([
            //
        ]);
    }
}
