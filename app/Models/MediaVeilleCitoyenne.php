<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaVeilleCitoyenne extends Model
{
    use HasFactory;

    protected $fillable = [
        "veille_citoyenne_id",
        "url"
    ];

    public function veilleCitoyenne() {

        return $this->belongsTo(VeilleCitoyenne::class);
    }

}
