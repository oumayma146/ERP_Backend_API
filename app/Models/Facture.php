<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference',
        'etat',
        'commande_id',
       
    ];
  
    public function commande(){
        return $this->hasOne(Commande::class );
    }
}
