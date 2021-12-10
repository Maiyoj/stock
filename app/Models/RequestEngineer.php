<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestEngineer extends Model
{
    use HasFactory;




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
    return $this->belongsTo(User::class,'engineer_id')->withTrashed();
}
public function teamleadstocks()
{
    return $this->hasMany(TeamLeadstock::class)->withTrashed();
}
public function returns()
{
    return $this->hasMany(Returns::class)->withTrashed();
}
 public function erequests_item()
 {
     return $this->hasMany(RequestEngineersItem::class);
 }
}
