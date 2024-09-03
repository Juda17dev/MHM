<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class   Appartement extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'immeuble_id'
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function immeuble(){
        return $this->belongsTo(Immeuble::class);
    }

    public function locataire(){
        return $this->hasOne(User::class);
    }
}
