<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\{Countries\Country, Region, Province, Commune};

use Laravel\Passport\HasApiTokens;
class User extends Authenticatable /*implements MustVerifyEmail*/
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'commune_id'
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

    public function country() {

        return $this->belongsTo(Country::class);
    }

    public function region() {

        return $this->belongsTo(Region::class);
    }

    public function province() {

        return $this->belongsTo(Province::class);
    }

    public function commune() {

        return $this->belongsTo(Commune::class);
    }

    public function data() {

        return $this->hasMany(Data::class);
    }
}
