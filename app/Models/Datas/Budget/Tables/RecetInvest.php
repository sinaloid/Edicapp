<?php

namespace App\Models\Datas\Budget\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Datas\Budget\Budget;

class RecetInvest extends Model
{
    use HasFactory;
    protected $fillable = [
        'budget_id', 
        'dotation_globale', 
        'subvention_equipement', 
        'contribution_propre', 
        'dotation_liee',
        'resultat_exercice', 
        'autre_subvention'
    ];

    
    public function budget() {

        return $this->belongsTo(Budget::class);
    }
}
