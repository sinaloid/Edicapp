<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    use HasFactory;

    protected $fillable = [
        "titre",
        "categorie",
        "slug",
        "image",
        "resumer",
        "description",
        "user_id",
        "status",
    ];

    public function user() {

        return $this->belongsTo(User::class);
    }
}
