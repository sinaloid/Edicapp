<?php

namespace App\Models\Datas\Infog\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datas\Infog\Infog;

class EtatCivil extends Model
{
    use HasFactory;
    protected $fillable = [
        'infog_id', 
        'naissance_nombre', 
        'naissance_observation', 
        'acte_de_naissance_nombre', 
        'acte_de_naissance_observation',
        'acte_de_deces_nombre', 
        'acte_de_deces_observation', 
        'mariage_celebre_nombre', 
        'mariage_celebre_observation',
        'autre_acte_nombre', 
        'autre_acte_nombre_observation', 
        'vente_timbre_nombre', 
        'vente_timbre_observation' 
    ];

    public function infog() {

        return $this->belongsTo(Infog::class);
    }
}
