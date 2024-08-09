<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
