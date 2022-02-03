<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    public function item()
    {
        return $this->belongsTo(Item::class)->withTrashed();
    }


    public function vendor()
    {
        return $this->belongsTo(Vendor::class)->withTrashed();
    }
   
    public function user()
    {
        return $this->belongsTo(User::class, 'teamlead_id')->withTrashed();
    }
    public function stock()
    {
        return $this->belongsTo(Stock::class)->withTrashed();
    }
    public function zone()
    {
        return $this->belongsTo(Zone::class)->withTrashed();

    }
    public function request_item()
    {
        return $this->hasMany(RequestItems::class);
    }


    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
