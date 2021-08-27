<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use HasFactory, SoftDeletes;


    public function purchases()
    {
        return $this->hasMany(Purchase::class)->withTrashed();
    }


    public function prices()
    {
        return $this->hasMany(Price::class)->withTrashed();
    }


}
