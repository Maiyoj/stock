<?php

namespace App\Exports;

use App\Models\Teamlead;
use Maatwebsite\Excel\Concerns\FromCollection;

class TeamleadExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Teamlead::all();
    }
}
