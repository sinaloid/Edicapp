<?php

namespace App\Models\Datas\BudgetN;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datas\Data;
use App\Models\Datas\BudgetN\Tables\{RecetInvestN, DepensInvestN, RecetFonctN, DepensFonctN};

class BudgetN extends Model
{
    use HasFactory;

    public function data() {

        return $this->belongsTo(Data::class);
    }

    public function recetinvestns() {

            return $this->hasMany(RecetInvestN::class);
        }

        public function depensinvestns() {

            return $this->hasMany(DepensInvestN::class);
        }

        public function recetfonctns() {

            return $this->hasMany(RecetFonctN::class);
        }

        public function depensfonctns() {

            return $this->hasMany(DepensFonctN::class);
        }
}
