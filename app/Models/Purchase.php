<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use HasFactory, SoftDeletes;

    public function item()
    {
        return $this->belongsTo(Item::class)->withTrashed();
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class)->withTrashed();
    }

    public function price()
    {
        return $this->belongsTo(price::class)->withTrashed();
    }
    public function purchase_items()
    {
        return $this->hasMany(PurchaseItem::class);
    }
}
