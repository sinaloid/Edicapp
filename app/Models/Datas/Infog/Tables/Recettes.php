<?php

namespace App\Models\Datas\Infog\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datas\Infog\Infog;

class Recettes extends Model
{
    use HasFactory;
    protected $fillable = [
        'infog_id',
        'annee',
        'fonctionnement',
        'investissement'
    ];

    public function infog() {

        return $this->belongsTo(Infog::class);
    }
}
