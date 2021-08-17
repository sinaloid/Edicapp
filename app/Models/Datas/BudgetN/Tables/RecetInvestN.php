<?php

namespace App\Models\Datas\BudgetN\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Datas\BudgetN\BudgetN;


class RecetInvestN extends Model
{
    use HasFactory;
    protected $fillable = [
        'budget_n_id', 
        'dotation_globale', 
        'subvention_equipement', 
        'contribution_propre', 
        'dotation_liee',
        'resultat_exercice', 
        'autre_dotation'
    ];


    public function budget_n() {

        return $this->belongsTo(BudgetN::class);
    }
}
