<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;

class CommandesController extends Controller
{
    public function index()
    {
        $commandes = Commande::all();

        return response()->json($commandes);
    }

    public function store(Request $request)
    {
        $commande = new Commande;

        $commande->name = $request->input('name');
        $commande->description = $request->input('description');
        $commande->price = $request->input('price');
        $articles = json_decode($request->get('articles'),true);
        $commande->save();
        foreach($articles as $perm_id)
        $commande->permissions()->attach([$perm_id]);

      return response()->json($commande);
    }

    public function show($id)
    {
        $commande = Commande::find($id);

        return response()->json($commande);
    }

    public function update(Request $request, $id)
    {
        $commande = Commande::find($id);

        $commande->name = $request->input('name');
        $commande->description = $request->input('description');
        $commande->price = $request->input('price');

        $commande->save();

        return response()->json($commande);
    }

    public function destroy($id)
    {
        $commande = Commande::find($id);

        $commande->delete();

        return response()->json(['message' => 'Commande deleted']);
    }
}
