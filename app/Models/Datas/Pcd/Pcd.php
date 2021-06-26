<?php

namespace App\Models\Datas\Pcd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datas\Data;
use App\Models\Datas\Pcd\Tables\{Appreciations, Satisfactions};

class Pcd extends Model
{
    use HasFactory;
    public function data() {

        return $this->belongsTo(Data::class);
    }

    public function appreciations() {

        return $this->hasMany(Appreciation::class);
    }

    public function satisfactions() {

        return $this->hasMany(Satisfaction::class);
    }
}
