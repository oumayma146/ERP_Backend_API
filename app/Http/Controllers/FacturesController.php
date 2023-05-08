<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\Request;

class FacturesController extends Controller
{
    public function consulterListeFactureNonPayee()
    {    $liste_factures=Facture::with('commande')->where('etat','=','non payee')->get();
        return response()->json([
            'liste_factures'=>$liste_factures,
            
            ], 200);
    }
    public function detailsFacture($facture_id)
    {    $facture=Facture::with('commande')->where('id','=',$facture_id)->get();
        return response()->json([
            'facture'=>$facture,
            
            ], 200);
    }
    public function update(Request $request,$facture_id)
    {
        $updated = Facture::where('id', $facture_id)->update([
            'etat'=>$request->etat,
        ]);
        return response()->json([
            'status' => $updated
        ], 200);
    }
}
