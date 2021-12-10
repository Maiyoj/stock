<?php

namespace App\Exports;

use App\Models\Returned;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReturnedExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Returned::all();
    }
}
