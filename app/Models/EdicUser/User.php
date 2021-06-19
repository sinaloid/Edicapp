<?php

namespace App\Models\EdicUser;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Countries\Commune;
use App\Models\Datas\Data;

class User extends Model
{
    use HasFactory;

    public function commune() {

        return $this->belongsTo(Commune::class);
    }

    public function data() {

        return $this->hasMany(Data::class);
    }
}
