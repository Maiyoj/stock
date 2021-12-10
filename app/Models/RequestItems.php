<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestItems extends Model
{
    use HasFactory;

    public function request()
{
    return $this->belongsTo(Request::class)->withTrashed();
}


public function stock()
{
    return $this->belongsTo(Stock::class)->withTrashed();
}
}
