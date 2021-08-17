<?php

namespace App\Models\Datas\Budget;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datas\Data;
use App\Models\Datas\Budget\Tables\{RecetInvest, DepensInvest, RecetFonct, DepensFonct};

class Budget extends Model
{
    use HasFactory;
    protected $fillable = [
        'data_id',
    ];

    public function data() {

        return $this->belongsTo(Data::class);
    }

    public function recetinvests() {

            return $this->hasMany(RecetInvest::class);
        }

        public function depensinvests() {

            return $this->hasMany(DepensInvest::class);
        }

        public function recetfoncts() {

            return $this->hasMany(RecetFonct::class);
        }

        public function depensfoncts() {

            return $this->hasMany(DepensFonct::class);
        }
    
}