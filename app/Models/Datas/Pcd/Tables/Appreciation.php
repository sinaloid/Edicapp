<?php

namespace App\Models\Datas\Pcd\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datas\Pcd\Pcd;

class Appreciation extends Model
{
    use HasFactory;
    protected $fillable = [
        'pcd_id', 
        'date_de_conception', 
        'date_d_expiration', 
        'montant_total', 
        'montant_mobilise', 
        'probleme_majeur', 
        'perpective_dix_mot'
    ];

    public function pcd() {

        return $this->belongsTo(Pcd::class);
    }
}
