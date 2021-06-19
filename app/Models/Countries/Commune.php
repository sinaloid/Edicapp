<?php

namespace App\Models\Countries;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datas\Data;
use App\Models\EdicUser\User;

class Commune extends Model
{
    use HasFactory;
    
    /*liaison à la table province, data, user */
    public function province() {

        return $this->belongsTo(Province::class);
    }

    public function data() {

        return $this->hasOne(Data::class);
    }

    public function users() {

        return $this->hasMany(User::class);
    }
}
