<?php

namespace App\Imports;

use App\Models\Returns;
use Maatwebsite\Excel\Concerns\ToModel;

class ReturnsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Returns([
            //
        ]);
    }
}
