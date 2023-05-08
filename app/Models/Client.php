<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'telephone',
        'chiffre_affaire', 
        'commande_id'
    ];
    public function commande(){
        return $this->hasMany(Commande::class );
    }
}
