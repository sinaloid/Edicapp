<?php

namespace App\Models\Datas;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Countries\Commune;
use App\Models\EdicUser\User;
use App\Models\Datas\Infog\Infog;
use App\Models\Datas\Pcd\Pcd;
use App\Models\Datas\Budget\Budget;
use App\Models\Datas\BudgetN\BudgetN;

class Data extends Model
{
    use HasFactory;

    public function commune() {

        return $this->belongsTo(Commune::class);
    }

    public function user() {

        return $this->belongsTo(User::class);
    }

    public function infogs() {

        return $this->hasMany(InfoG::class);
    }

    public function pcds() {

        return $this->hasMany(Pcd::class);
    }

    public function budgets() {

        return $this->hasMany(Budget::class);
    }

    public function budgetns() {

        return $this->hasMany(BudgetN::class);
    }
}
