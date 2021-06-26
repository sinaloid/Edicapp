<?php

namespace App\Models\Datas\Infog\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datas\Infog\Infog;

class DomaineCivil extends Model
{
    use HasFactory;
    
    public function infog() {

        return $this->belongsTo(Infog::class);
    }
}
