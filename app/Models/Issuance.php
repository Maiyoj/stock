<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issuance extends Model
{
    use HasFactory, SoftDeletes;

    
    public function item()
    {
        return $this->belongsTo(Item::class)->withTrashed();
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    public function issuance()
    {
        return $this->belongsTo(Issuance::class)->withTrashed();
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class)->withTrashed();

    }


}
