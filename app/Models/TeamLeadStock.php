<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamLeadStock extends Model
{
    use HasFactory, SoftDeletes;
    public function item()
    {
        return $this->belongsTo(Item::class)->withTrashed();
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function issuances()
    {
        return $this->belongsTo(Issuances::class)->withTrashed();
    }
    public function returned()
    {
        return $this->hasMany(Returned::class)->withTrashed();
    }
    public function requestengineer()
    {
        return $this->hasMany(RequestEngineer::class)->withTrashed();
    }

    /*public function returns()
    {
        return $this->hasMany(Returns::class)->withTrashed();
    }
    */
}
