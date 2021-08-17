<?php

namespace App\Models\Datas\Pcd;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datas\Data;
use App\Models\Datas\Pcd\Tables\{Appreciation, Satisfaction};

class Pcd extends Model
{
    use HasFactory;
    protected $fillable = [
        'data_id',
    ];

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
