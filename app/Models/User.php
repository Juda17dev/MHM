<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public final const AGENT = 1;
    public final const LOCATAIRE = 2;
    public final const PROPRIETAIRE = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
        'password',
        'role_id',
        'immeuble_id',
        'appartement_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function appartements():HasManyThrough{
        return $this->hasManyThrough(Appartement::class, Immeuble::class);
    }

    public function immeubles(){
        return $this->hasMany(Immeuble::class);
    }

    public function appartements_Locataire(){
        return $this->belongsTo(Appartement::class);
    }

    public function residants(){
        return $this->hasManyThrough(static::class, Immeuble::class);
    }






    public static function locataires() : Collection {
        return self::query()->where('role_id', self::LOCATAIRE)->get();
    }

    public static function agents() : Collection {
        return self::query()->where('role_id', self::AGENT)->get();
    }

    public function incidents(){
        return $this->hasMany(Incident::class);
    }
}
