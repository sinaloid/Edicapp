<?php

namespace App\Models\Datas\BudgetN\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Datas\BudgetN\BudgetN;


class DepensInvestN extends Model
{
    use HasFactory;
    protected $fillable = [
        'budget_n_id', 
        'etude_recherche', 
        'environnement', 
        'equipement', 
        'batiment',
        'emprunt', 
        'autre_investissement',
    ];

    public function budget_n() {

        return $this->belongsTo(BudgetN::class);
    }
}
