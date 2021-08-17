<?php

namespace App\Models\Datas\Infog\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datas\Infog\Infog;

class DomaineCivil extends Model
{
    use HasFactory;
    protected $fillable = [
        'infog_id', 
        'zone_habitation_parcelle_degagee', 
        'zone_habitation_parcelle_attribuee', 
        'zone_habitation_parcelle_restante',
        'zone_commerciale_parcelle_degagee', 
        'zone_commerciale_parcelle_attribuee', 
        'zone_commerciale_parcelle_restante',
        'zone_administrative_parcelle_degagee', 
        'zone_administrative_parcelle_attribuee', 
        'zone_administrative_parcelle_restante',
        'zone_autre_parcelle_degagee', 
        'zone_autre_parcelle_attribuee', 
        'zone_autre_parcelle_restante',
        'surface_degagee', 
        'surface_attribuee', 
        'surface_restante'
    ];
    
    public function infog() {

        return $this->belongsTo(Infog::class);
    }
}
