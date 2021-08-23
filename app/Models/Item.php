<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function vendors()
    {
        return $this->hasMany(Vendor::class);
    }


    public function purchase()
    {
        return $this->hasMay(Purchase::class);
    }
    public function stock()
    {
        return $this->hasMany(Stock::class);
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
