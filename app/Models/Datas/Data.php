<?php

namespace App\Models\Datas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Countries\Commune;
use App\Models\EdicUser\User;

class Data extends Model
{
    use HasFactory;

    public function commune() {

        return $this->belongsTo(Commune::class);
    }

    public function user() {

        return $this->belongsTo(User::class);
    }
}
