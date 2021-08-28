<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;



class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function zone()
    {
        return $this->hasMany(Zone::class)->withTrashed();
    }

    public function issuancee()
    {
        return $this->hasMany(Issuancee::class)->withTrashed();
    }

    public function issuance()
    {
        return $this->hasMany(Issuance::class)->withTrashed();
    }
    public function teamleadstocks()
    {
        return $this->hasMany(TeamLeadStock::class)->withTrashed();
    }

    public function returns()
    {
        return $this->hasMany(Returns::class)->withTrashed();
    }
    public function returned()
    {
        return $this->hasMany(Returned::class)->withTrashed();
    }
}
