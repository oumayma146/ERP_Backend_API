<?php

namespace App\Http\Controllers;
use App\Models\Commande;
use App\Models\Facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FournisseursController extends Controller
{
    public function updateCommande(Request $request,$commande_id)
    {
        $updated = Commande::where('id', $commande_id)->update([
            'etat'=>$request->etat,
        ]);
        return response()->json([
            'status' => $updated
        ], 200);
    }
    public function consulterListeFacture()
    {    try {
        $liste_factures = DB::table('factures')
        ->leftJoin('commandes', 'factures.id', '=', 'commandes.facture_id')
        ->whereNotNull('commandes.fournisseur_id')
        ->select('factures.*')
        ->get();
        return response()->json([
            'liste_factures' => $liste_factures,
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'error' => $e->getMessage()
        ], 500);
    }
    }
    public function detailsFacture($facture_id)
    {    $facture=Facture::with('commande')->where('id','=',$facture_id)->get();
        return response()->json([
            'facture'=>$facture,
            
            ], 200);
    }
    public function consulterCommandeValidé()
    {
        $commande_validé=Commande::where('etat','=','validé')->where('fournisseur_id','!=','null')->get();
        return response()->json([
        'commande_validé'=>$commande_validé,
        
        ], 200);
       
    }
    public function consulterCommandeNonValidé()
    {
        $commande_nonvalidé=Commande::where('etat','=','non validé')->where('fournisseur_id','!=','null')->get();
        return response()->json([
        'commande_nonvalidé'=>$commande_nonvalidé,
        
        ], 200);
    }
}
