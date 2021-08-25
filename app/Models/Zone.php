<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Zone extends Model
{
    use HasFactory, SoftDeletes;
    
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function issuance()
    {
        return $this->hasMany(Issuance::class)->withTrashed();
    }
    public function issuancee()
    {
        return $this->belongsTo(Issuancee::class)->withTrashed();
    }
}
