<?php

namespace App\Models\Datas\Budget\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Datas\Budget\Budget;

class RecetFonct extends Model
{
    use HasFactory;
    protected $fillable = [
        'budget_id', 
        'produit_exploitation', 
        'produit_domaniaux', 
        'produit_financier',
        'recouvrement', 
        'produit_diver', 
        'impots_taxe_c_direct', 
        'impots_taxe_indirect', 
        'produit_exceptionnel',
        'produit_anterieur', 
        'autres_dotations'
    ];

    public function budget() {

        return $this->belongsTo(Budget::class);
    }
}
