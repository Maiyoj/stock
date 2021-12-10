<?php

namespace App\Imports;

use App\Models\RequestEngineer;
use Maatwebsite\Excel\Concerns\ToModel;

class RequestEngineerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RequestEngineer([
            //
        ]);
    }
}
