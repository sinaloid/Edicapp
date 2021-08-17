<?php

namespace App\Models\Datas\Budget\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Datas\Budget\Budget;

class DepensInvest extends Model
{
    use HasFactory;
    protected $fillable = [
        'budget_id', 
        'etude_recherche', 
        'environnement', 
        'equipement', 
        'batiment',
        'emprunt', 
        'autre_investissement', 
        'deficit_excedent'
    ];

    public function budget() {

        return $this->belongsTo(Budget::class);
    }
}
