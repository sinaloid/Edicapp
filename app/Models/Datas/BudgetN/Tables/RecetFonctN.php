<?php

namespace App\Models\Datas\BudgetN\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Datas\BudgetN\BudgetN;


class RecetFonctN extends Model
{
    use HasFactory;
    protected $fillable = [
        'budget_n_id', 
        'produit_exploitation', 
        'produit_domaniaux', 
        'produit_financier',
        'recouvrement', 
        'produit_diver', 
        'impots_taxe_c_direct', 
        'impots_taxe_indirect', 
        'produit_exceptionnel',
        'produit_anterieur', 
    ];

    public function budget_n() {

        return $this->belongsTo(BudgetN::class);
    }
}
