<?php

namespace App\Models\Datas\Infog;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datas\Data;
use App\Models\Datas\Infog\Tables\{Recettes, Depenses, TroisMeilleurs, DixMeilleurs, Partenaires, EtatCivil, DomaineCivil};

class Infog extends Model
{
    use HasFactory;

    public function data() {

        return $this->belongsTo(Data::class);
    }

    public function recettes() {

        return $this->hasMany(Recettes::class);
    }

    public function depenses() {

        return $this->hasMany(Depenses::class);
    }

    public function troismeilleurs() {

        return $this->hasMany(TroisMeilleurs::class);
    }

    public function dixmeilleurs() {

        return $this->hasMany(DixMeilleurs::class);
    }

    public function partenaire() {

        return $this->hasMany(Partenaire::class);
    }

    public function etatcivils() {

        return $this->hasMany(EtatCivil::class);
    }

    public function domainecivils() {

        return $this->hasMany(DomaineCivil::class);
    }
}
