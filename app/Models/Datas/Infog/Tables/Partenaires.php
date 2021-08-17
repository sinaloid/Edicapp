<?php

namespace App\Models\Datas\Infog\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datas\Infog\Infog;

class Partenaires extends Model
{
    use HasFactory;
    protected $fillable = [
        'infog_id', 
        'identite_ptf', 
        'evaluation_contribution', 
        'principale_action'
    ];

    public function infog() {

        return $this->belongsTo(Infog::class);
    }
}
