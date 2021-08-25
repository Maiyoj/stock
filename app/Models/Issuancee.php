<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Issuancee extends Model
{
    use HasFactory, SoftDeletes;


public function item()
{
    
    return $this->belongsTo(Item::class)->withTrashed();
}

public function zone()
{
    return $this->belongsTo(Zone::class)->withTrashed();
}
public function issuancee()
{
    return $this->belongsTo(Issuancee::class)->withTrashed();
}
public function user()
{
    return $this->belongsTo(User::class)->withTrashed();
}
public function teamleadstocks()
{
    return $this->hasMany(TeamLeadstock::class)->withTrashed();
}

}
