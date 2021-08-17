<?php

namespace App\Models\Datas\Pcd\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datas\Pcd\Pcd;

class Satisfaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'pcd_id', 
        'reforme_tres_satisfaisant', 
        'reforme_satisfaisant', 
        'reforme_pas_satisfaisant',
        'developper_tres_satisfaisant', 
        'developper_satisfaisant', 
        'developper_pas_satisfaisant',
        'dynamiser_tres_satisfaisant', 
        'dynamiser_satisfaisant', 
        'dynamiser_pas_satisfaisant', 
        'commenteaire_appreciation'
    ];

    public function pcd() {

        return $this->belongsTo(Pcd::class);
    }
}
