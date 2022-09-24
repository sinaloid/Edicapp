<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'membre_id',
        'sujet_id',
        'commentaire'
    ];

    public function sujet(){

        return $this->belongsTo(Sujet::class);
    }
    public function membre(){

        return $this->belongsTo(Membre::class);
    }
}
