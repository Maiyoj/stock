<?php

namespace App\Imports;

use App\Models\Teamlead;
use Maatwebsite\Excel\Concerns\ToModel;

class TeamleadImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Teamlead([
            //
        ]);
    }
}
