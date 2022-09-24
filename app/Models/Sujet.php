<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Countries\Commune;

class Sujet extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'commune_id',
        'description',
        'membre_id',
        'slug',
        'nombre_reponse',
        'nombre_vue',
    ];

    public function membre() {

        return $this->belongsTo(Membre::class);
    }

    public function commune() {

        return $this->belongsTo(Commune::class);
    }

    public function commentaires() {

        return $this->hasMany(Commentaire::class);
    }
}
