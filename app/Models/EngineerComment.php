<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EngineerComment extends Model
{
    use HasFactory;

    public function requestengineer()
    {
        return $this->belongsTo(RequestEngineer::class)->withTrashed();
    }
}
