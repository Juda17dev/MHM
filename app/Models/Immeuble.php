<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Immeuble extends Model
{
    use HasFactory;

    protected $fillable =[
        'libelle',
        'user_id',
        'adresse'
    ];

    public function appartements(){
        return $this->hasMany(Appartement::class);
    }

    public function proprietaire(){
        return $this->belongsTo(User::class);
    }

    public function visiteurs():HasManyThrough{
        return $this->hasManyThrough(Visiteur::class, self::locataires());
    }
}
