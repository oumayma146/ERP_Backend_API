<?php

namespace App\Http\Controllers;

use App\Models\Caisse;
use Illuminate\Http\Request;

class CaissesController extends Controller
{
    public function get()
    {
        $caisse = Caisse::all();
        return response()->json($caisse);
    }
    public function sumCheque()
    {
        $cheque = Caisse::sum('chèque');
        return response()->json($cheque);
    }
    public function sumVirement()
    {
        $virement = Caisse::sum('virement');
        return response()->json($virement);
    }
    public function sumEspece()
    {
        $espece = Caisse::sum('espéce');
        return response()->json($espece);
    }
}
