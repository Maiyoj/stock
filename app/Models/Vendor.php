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


    public function returnss()
    {
        return $this->hasMany(Returns::class)->withTrashed();
    }

    public function returneds()
    {
        return $this->hasMany(Returned::class)->withTrashed();
    }



    public function requests()
    {
        return $this->hasMany(Requests::class)->withTrashed();
    }
}
