<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference',
        'etat',
        'distination',
        'quantité',
        'remise',
        'montant',
        'total_hors_taxe',
        'total_fodac',
        'total_tva',
        'total_timbre',
        'total_ttc',
        'client_id',
        'fournisseur_id',
        'article_id',
       'bon_livraision_id'
    ];
    protected $with = ['client','fournisseur','article'];

    public function client(){
        return $this->hasOne(Client::class );
    }
    public function fournisseur(){
        return $this->hasOne(Fournisseur::class );
    }
    public function bon_livraision(){
        return $this->hasOne(BonLivraision::class );
    }
    public function facture(){
        return $this->hasOne(Facture::class );
    }
    
    public function article(){
        return $this->belongsToMany('\App\Models\Article', 'commande_has_article', 'commande_id', 'article_id');
    }
}
