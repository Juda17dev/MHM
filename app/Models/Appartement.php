<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appartement extends Model
{
    use HasFactory;

    public function users(){
        return $this->hasOne(Appartement::class);
    }

    public function immeubles(){
        return $this->belongsTo(Immeuble::class);
    }
}
