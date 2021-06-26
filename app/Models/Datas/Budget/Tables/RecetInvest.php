<?php

namespace App\Models\Datas\Budget\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\Datas\Budget\Budget;

class RecetInvest extends Model
{
    use HasFactory;

    public function budget() {

        return $this->belongsTo(Budget::class);
    }
}
