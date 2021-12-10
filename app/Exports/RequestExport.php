<?php

namespace App\Exports;

use App\Models\Request;
use App\Models\Requests;
use Maatwebsite\Excel\Concerns\FromCollection;

class RequestExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Requests::all();
    }
}
