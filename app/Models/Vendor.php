<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Vendor extends Model
{
    use HasFactory, SoftDeletes ;

    public function item()
    {
        return $this->belongsTo(Item::class)->withTrashed();
    }

    public function purchase()
    {
        return $this->hasMany(Purchase::class)->withTrashed();
    }
    
    public function issuance()
    {
        return $this->hasMany(Issuance::class)->withTrashed();
    }
    public function issuancee()
    {
        return $this->hasMany(Issuancee::class)->withTrashed();
    }

}
