<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issuance extends Model
{
    use HasFactory;

    
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    public function issuance()
    {
        return $this->belongsTo(Issuance::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class);

    }


}
