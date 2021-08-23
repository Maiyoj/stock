<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }


    
    public function issuance()
    {
        return $this->hasMany(Issuance::class);
    }
    public function issuancee()
    {
        return $this->hasMany(Issuancee::class);
    }

}
