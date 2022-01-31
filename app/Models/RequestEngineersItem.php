<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestEngineersItem extends Model
{
    use HasFactory;
    public function requestengineer()
{
    return $this->belongsTo(RequestEngineer::class)->withTrashed();
}


public function items()
{
    return $this->belongsTo(Item::class,'item_id');
}

}
