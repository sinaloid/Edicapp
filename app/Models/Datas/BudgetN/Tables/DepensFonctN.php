<?php

namespace App\Models\Datas\BudgetN\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Datas\BudgetN\BudgetN;


class DepensFonctN extends Model
{
    use HasFactory;
    protected $fillable = [
        'budget_n_id', 
         'sante', 
         'appui_scolaire', 
         'sport_culture', 
         'eau_assainissement',
         'participation', 
         'frais_financier',
         'refection_entretien', 
         'salaire_indemnite', 
         'entretien_vehicule', 
         'appui_fonctionnement', 
         'exedent_prelevement'
    ];


    public function budget_n() {

        return $this->belongsTo(BudgetN::class);
    }
}
