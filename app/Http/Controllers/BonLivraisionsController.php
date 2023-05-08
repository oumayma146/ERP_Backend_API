<?php

namespace App\Http\Controllers;

use App\Models\BonLivraision;
use Illuminate\Http\Request;

class BonLivraisionsController extends Controller
{
    public function consulterListeBonLivraision()
    {    $liste_bon_livraision=BonLivraision::all();
        return response()->json([
            'liste_bon_livraision'=>$liste_bon_livraision,
            
            ], 200);
    }
    public function detailsBonLivraision($bon_id)
    {    $bon_livraision=BonLivraision::where('id','=',$bon_id)->get();
        return response()->json([
            'bon_livraision'=>$bon_livraision,
            
            ], 200);
    }
}
