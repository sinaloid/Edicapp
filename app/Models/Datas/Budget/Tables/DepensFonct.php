<?php

namespace App\Models\Datas\Budget\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Datas\Budget\Budget;

class DepensFonct extends Model
{
    use HasFactory;
    protected $fillable = [
        'budget_id', 
         'sante', 
         'appui_scolaire', 
         'sport_culture', 
         'participation', 
         'frais_financier',
         'refection_entretien', 
         'salaire_indemnite', 
         'entretien_vehicule', 
         'appui_fonctionnement', 
         'exedent_prelevement'
    ];

    
    public function budget() {

        return $this->belongsTo(Budget::class);
    }
}
