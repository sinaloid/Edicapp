<?php

namespace App\Models\Datas\Infog\Tables;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Datas\Infog\Infog;

class RessourceImage extends Model
{
    use HasFactory;
    protected $table = 'ressource_image';
    protected $fillable = [
        'infog_id', 
        'url'
    ];

    public function infog() {

        return $this->belongsTo(Infog::class);
    }
}
