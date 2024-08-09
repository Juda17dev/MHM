<?php
namespace App\Models;

use App\Enums\TypeStatutEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'identite',
        'locataire_id',
        'agent_id',
        'statut'
    ];

    protected $casts = [
        'statut' => TypeStatutEnum::class
    ];

    public function locataire(){
        return $this->belongsTo(User::class, 'locataire_id');
    }

    public function agent(){
        return $this->belongsTo(User::class, 'agent_id');
    }


}
