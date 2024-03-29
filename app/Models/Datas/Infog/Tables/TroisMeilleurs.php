<?php

namespace App\Models\Datas\Infog\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datas\Infog\Infog;

class TroisMeilleurs extends Model
{
    use HasFactory;
    protected $fillable = [
        'infog_id', 
        'marche', 
        'attendu', 
        'contribution'
    ];

    public function infog() {

        return $this->belongsTo(Infog::class);
    }
}
