<?php

namespace App\Models\Datas\BudgetN\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Datas\BudgetN\BudgetN;


class RecetInvestN extends Model
{
    use HasFactory;

    public function budget_n() {

        return $this->belongsTo(BudgetN::class);
    }
}
