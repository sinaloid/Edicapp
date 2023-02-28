<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeilleCitoyenne extends Model
{
    use HasFactory;

    protected $fillable = [
        "nom",
        "email",
        "numero",
        "categorie",
        "localisation",
        "longitude",
        "latitude",
        "resumer",
        "slug",
        "status",
        "description",
    ];

    public function medias() {

        return $this->hasMany(MediaVeilleCitoyenne::class);
    }
}