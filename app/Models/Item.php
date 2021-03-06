<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Item extends Model
{
    #added the soft deletes
    protected $fillable = ['id','type', 'name','description','units', 'sku','updated_at','created_at'];


    use HasFactory, SoftDeletes ;

    public function vendors()
    {
        return $this->hasMany(Vendor::class)->withTrashed();
    }
    public function itemprice()
    {
        return $this->hasMany(Price::class);
    }

    public function purchase()
    {
        return $this->hasMay(Purchase::class)->withTrashed();
    }
    public function stock()
    {
        return $this->hasMany(Stock::class)->withTrashed();
    }

    public function issuance()
    {
        return $this->hasMany(Issuance::class)->withTrashed();
    }
    public function issuancee()
    {
        return $this->hasMany(Issuancee::class)->withTrashed();

    }

    public function returns()
    {
        return $this->hasMany(Returns::class)->withTrashed();
    }
    public function returned()
    {
        return $this->hasMany(Returned::class)->withTrashed();
    
}


public function requests()
{
    return $this->hasMany(Requests::class)->withTrashed();

}


public function requestengineer()
{
    return $this->hasMany(RequestEngineer::class)->withTrashed();

}
}