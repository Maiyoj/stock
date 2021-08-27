<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Price extends Model
{
    use HasFactory, SoftDeletes;


    
    public function purchases()
    {
        return $this->hasMany(Purchase::class)->withTrashed();
    }


    public function vendor()
    {
        return $this->belongsTo(Vendor::class)->withTrashed();
    }

    public function item()
    {
        return $this->belongsTo(Item::class)->withTrashed();
    }


}
