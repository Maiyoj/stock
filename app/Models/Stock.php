<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stock extends Model
{
    use HasFactory, SoftDeletes;

    public function item()
    {
        return $this->belongsTo(Item::class)->withTrashed();
    }

    public function isssuance()
    {
        return $this->hasMany(Issuance::class)->withTrashed();
    }

    public function returned()
    {
        return $this->hasMany(Returned::class)->withTrashed();
    }
}
