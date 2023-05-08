<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BonLivraision extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference',
        'commande_id',
       
    ];
    protected $with = ['commande'];
    public function commande(){
        return $this->hasOne(Commande::class );
    }
}
