<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issuancee extends Model
{
    use HasFactory;


public function item()
{
    
    return $this->belongsTo(Item::class);
}

public function zone()
{
    return $this->belongsTo(Zone::class);
}
public function issuancee()
{
    return $this->belongsTo(Issuancee::class);
}
public function user()
{
    return $this->belongsTo(User::class);
}
public function teamleadstocks()
{
    return $this->hasMany(TeamLeadstock::class);
}

}
