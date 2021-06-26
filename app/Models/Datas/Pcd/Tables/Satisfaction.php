<?php

namespace App\Models\Datas\Pcd\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datas\Pcd\Pcd;

class Satisfaction extends Model
{
    use HasFactory;
    public function pcd() {

        return $this->belongsTo(Pcd::class);
    }
}
