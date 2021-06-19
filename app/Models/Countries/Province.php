<?php

namespace App\Models\Countries;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    public function region() {

        return $this->belongsTo(Region::class);
    }

    public function communes() {

        return $this->hasMany(Commune::class);
    }
}
