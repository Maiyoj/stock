<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function issuance()
    {
        return $this->hasMany(Issuance::class);
    }


    public function issuancee()
    {
        return $this->belongsTo(Issuancee::class);
    }
}
