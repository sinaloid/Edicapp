<?php

namespace App\Models\Datas\Infog\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datas\Infog\Infog;

class DixMeilleurs extends Model
{
    use HasFactory;
    protected $fillable = [
        'infog_id', 
        'le_village', 
        'attendu', 
        'mobilise'
    ];

    public function infog() {

        return $this->belongsTo(Infog::class);
    }
}
