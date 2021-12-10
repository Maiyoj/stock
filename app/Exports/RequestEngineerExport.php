<?php

namespace App\Exports;

use App\Models\RequestEngineer;
use Maatwebsite\Excel\Concerns\FromCollection;

class RequestEngineerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RequestEngineer::all();
    }
}
